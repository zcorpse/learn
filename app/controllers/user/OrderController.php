<?php
use Laracasts\Validation\FormValidationException;
class OrderController extends AppController {

	public function getItem()
	{	
		$productType = Param::productType('product_type')->orderBy('key','ASC')->get();
		
		$sort = Input::get('sort');
		$ptype = Input::get('type');
		$order = Input::get('order');

		if($ptype && $sort)
			$products = Product::sorter($ptype,$sort,$order)->paginate(Config::get('view.pages', '20'));
		if($ptype && !$sort)
			$products = Product::sorter($ptype,false,false)->paginate(Config::get('view.pages', '20'));
		if(!$ptype && $sort)
			$products = Product::sorter(false,$sort,$order)->paginate(Config::get('view.pages', '20'));
		if(!$ptype && !$sort)
			$products = Product::sorter(false,false,false)->paginate(Config::get('view.pages', '20'));
		/*switch ($sort) {
			case 'price1':
				$products = Product::productType($ptype)->orderBy('price2','DESC')->paginate(Config::get('view.pages', '20'));
				break;
			case 'price2':
				$products = Product::productType($ptype)->orderBy('price2','ASC')->paginate(Config::get('view.pages', '20'));
				break;
			case 'date':
				$products = Product::productType($ptype)->orderBy('id','DESC')->paginate(Config::get('view.pages', '20'));
				break;
			default:
				if($ptype)
					$products = Product::productType($ptype)->orderBy('order','ASC')->paginate(Config::get('view.pages', '20'));
				else
					$products = Product::orderBy('order','ASC')->paginate(Config::get('view.pages', '20'));
				break;
		}*/
		
		

        $arrType = Product::getProductTypesCache();
        $arrCategory = Product::getProductCategoriesCache();
        
        foreach($products as $product){
            foreach($arrType as $type){
                if($product->type == $type->key)
                    $product->type = $type->value;
            }
            foreach($arrCategory as $category){
                if($product->category == $category->key)
                    $product->category = $category->value;
            }
        }


        return View::make($this->views, compact('products','sort','ptype','order','productType'));
	}


	public function postItem()
	{	
		$product = Product::find(Input::get('id'));		
		
		if(!$product){
			return Redirect::back()->with(Flash::error(Lang('SYSTEM ERROR:Invalid parameter.')));
		}

		$item = Cart::userCart(Auth::user())->where('productid','=',$product->id)->first();

		if($item){
			$item->number = $item->number + 1;
			$item->total = $product->price2 * $item->number ;
		}
		else{
			$item = Cart::setItem(Auth::user(), $product);
		}

		if($item->save()){
			return json_encode($product);
		}		

	}



	public function postUpdate()
	{	
		Cart::updateCart(Auth::user(), Input::all());

      	return Redirect::route('user.order.cart')->with(Flash::success(Lang('Shopping cart is updated.')));
	}



	public function postClear()
	{	 				
		$item = Cart::userCart(Auth::user())->where('orderid','=',0)->delete();
				
      	return Redirect::route('user.order.cart')->with(Flash::success(Lang('Shopping cart is cleared.')));
	}



	public function getEdit($id = null)
	{
		if(isset($id)){
			$order = Order::find($id);			
			
			if($order->status != ORDER_UNPAY){
				return Redirect::route('user.order.view',$id)->with(Flash::error(Lang('The order can NOT be modify.')));
			}						
			
			$shoplist = User::getShopList();

			$having = Auth::user()->first;

			$checking = User::checkPayAmount(Auth::user(),$order->amount);
			
			return View::make($this->views, compact('order','shoplist', 'having','checking'));
			
		}
	}


	public function postCheck()
	{			
		Cart::updateCart(Auth::user(), Input::all());

		$amount = Cart::getUnpayCartAmount(Auth::user());

		$order = Order::setOrder(Auth::user(), $amount);

		if( $order ){

			Cart::updateCartItem(Auth::user(), $order, ORDER_UNPAY);
		
			return Redirect::route('user.order.edit',$order->id);	
		}

		return Redirect::route('user.order.cart')->with(Flash::error(Lang('Check shopping cart failed.')));
		
	}


	public function postCancel()
	{	
		$order = Order::find(Input::get("id"));

		if($order && ($order->status == ORDER_UNPAY)){
			
			Order::updateOrder(Auth::user(), $order, ORDER_CANCEL);
		}

		return Redirect::route('user.order.bought')->with(Flash::warning(Lang('Order canceled.')));
		
	}


	public function postPay()
	{
		$input = Input::all();
		$invoice = $input['invoice'];

		if( $invoice == INVOICE_EXPRESS){

	        $expressOrderValidator = App::make('ExpressOrderValidator');
	        try{
	            $expressOrderValidator->validate($input);
	        }
	        catch (FormValidationException $e){
	            return Redirect::back()->withInput()->withErrors($e->getErrors());
	        }	        
		}

		if( $invoice == INVOICE_SHOP){

		}

		$order = Order::find($input['id']);
		
		if($order){
			$balance = Auth::user()->balance;
			$amount = $order->amount;
			if($balance - $amount < 0){
				return Redirect::back()->withInput()->with(Flash::error(Lang('Insufficient account balance.')));
			}
			
			Order::payOrder(Auth::user(), $order, $input);

			//记录消费流水
			$recordType = Auth::user()->first ? RECORD_C_XF : RECORD_C_SC;
			Record::setRecord(Auth::user(),Auth::user(),FLAG_CREDIT,$recordType,$amount,RATE_100,true);

			if( $order->invoice == INVOICE_SHOP){
				$shop = User::find($input['shopid']);
				//记录超市返点流水
				Record::setRecord($shop, Auth::user(), FLAG_DEBIT,RECORD_D_TC,$amount,RATE_1,false);
			}
			
			return Redirect::route('user.order.bought')->with(Flash::success(Lang('Order payment success.')));
			
			
		}
	}

	


	public function postUndo()
	{
		$order = Order::find(Input::get('id'));
		if($order && ($order->status == ORDER_UNPAY)){
			$affected = Cart::userCart(Auth::user())
								->where('orderid','=',$order->id)
								->update(array(
										'status' => ORDER_UNPAY,
										'orderid' => 0));
			$order->delete();
			return Redirect::route('user.order.cart');
		}
	}



	public function getCart()
	{	
		$amount = 0;
		$items = Cart::userCart(Auth::user())->where('orderid','=',0)->get();
		foreach($items as $item){
			$price = $item->price2 * $item->number;
			$item->total = $price;
			$amount = $amount + $price;
		}
        return View::make($this->views, compact('items','amount'));
	}


	

	public function getView($id = null)
	{	
		if(isset($id)){
			$order = Order::find($id);
			//dd($order->items);
			return View::make($this->views, compact('order'));
		}
	}


	public function getBought()
	{			
		//$orders = Order::where('uid','=',Auth::user()->id)->orderBy('id','DESC')->get();		
		$orders = Auth::user()->orders;
		
		return View::make($this->views, compact('orders'));
	}


}