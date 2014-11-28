<?php

class Cart extends Eloquent  {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'orderitems';

	protected $guarded = array();

	public $timestamps = false; 

	public function scopeUserCart($query, User $user)
	{
        return $query->where('uid','=',$user->id)->where('orderid','=',0)->where('status','=',ORDER_UNPAY);
    }


    public static function setItem(User $user, Product $product)
    {
    	$item = new Cart;
    	$item->uid = $user->id;
		$item->productid = $product->id;
		$item->orderid = 0;
		$item->code = $product->code;
		$item->name = $product->name;
		$item->type = Product::getParamValue('product_type',$product->type);
		$item->category = Product::getParamValue('product_category',$product->category);
		$item->price1 = $product->price1;
		$item->price2 = $product->price2;
		$item->specs = $product->specs;
		$item->number = 1;
		$item->total = $product->price2;
		$item->status = ORDER_UNPAY;

		return $item;
    }



    public static function updateCartItem(User $user, Order $order, $status)
    {
    	return Cart::userCart($user)->where('orderid','=',0)
								->update(array('status' => $status,'orderid' => $order->id));
    }


    public static function getUnpayCartAmount(User $user)
    {
    	return Cart::userCart($user)->where('orderid','=',0)->sum('total');
    }



    public static function updateCart(User $user, $input)
    {
    	foreach($input as $key => $value){
    		if(str_contains($key,'number')){
				$id = preg_replace( '/[^\d]/ ', '',$key); 				
				$item = Cart::userCart($user)->where('productid','=',$id)->where('orderid','=',0)->first();

				if($item){
					if( $value <= 0){
						$item->delete();
					}
					else{
						$item->number = $value;
						$item->total = $item->price2 * $value;						
						$item->update();
					}

				}
			}		
				
		}
    }

   
	
}