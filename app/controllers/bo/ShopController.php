<?php

use Laracasts\Validation\FormValidationException;

class ShopController extends AppController {

	public function getList()
	{	 	
		$users = User::where('flag','=', FLAG_SP)
				->where('status','=',STATUS_NORMAL)	
				->where('region','=', Auth::user()->id)
				->orderBy('id','DESC')
				->get();
		return View::make($this->views, compact('users'));
	}


	public function getNew()
	{	 	
		$region = Auth::user();
		return View::make($this->views, compact('region'));
	}



	public function postNew()
	{	 	
		$input = Input::all();
		
		$shopValidator = App::make('ShopRegisterValidator');
        try{
            $shopValidator->validate($input);
        }
        catch (FormValidationException $e){
            return Redirect::back()->withInput()->withErrors($e->getErrors());
        }
		
		if ( User::loginName($input['login'])->first() ){    		
			return Redirect::back()->withInput()->with(Flash::error(Lang('Duplicate shop.')));
		} 
        	
		$user = User::shopregister($input, STATUS_NORMAL);
			
		if( $user ){
			return Redirect::route('bo.shop.list')->with(Flash::success(Lang('Shop register success.')));			
		}
		
		return Redirect::back()->withInput()->with(Flash::error(Lang('SYSTEM ERROR:Shop register failed.')));
	}



	public function getOrder()
	{	
		//$user = User::with('county')->find(21);
		//dd($user);
		$orders = Order::with('shopuser')->where('invoice','=',INVOICE_SHOP)->orderBy('id','DESC')->get();	
		
		foreach($orders as $key => $order){
			$region = User::find($order->shopid)->region;
			if( $region != Auth::user()->id){
				unset($orders[$key]);
			}
		}
		//dd(count($orders));
		return View::make($this->views, compact('orders'));
	}
	
}