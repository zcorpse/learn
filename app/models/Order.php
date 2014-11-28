<?php

class Order extends Eloquent  {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	//protected $table = 'hms_order';

	protected $guarded = array();

	public $timestamps = false; 

	public function items()
	{
		return $this->hasMany('Cart','orderid','id');
	}

	public function shop()
	{
		return $this->hasOne('User','id','shopid');
	}

	public function shopuser()
	{
		return $this->belongsTo('User', 'shopid', 'id');
	}

	public function user()
	{
		return $this->hasOne('User','id','uid');
	}

	

	public static function updateOrder(User $user, Order $order, $status)
	{
		$order->status = $status;
		$order->update();

		Cart::updateCartItem($user, $order, $status);
	}



	public static function payOrder(User $user, Order $order, $input)
	{
		$order->status 		= ORDER_NORMAL;
		$order->invoice 	= array_get($input, 'invoice');
		$order->name 		= array_get($input, 'name');
		$order->mobile 		= array_get($input, 'mobile');
		$order->postcode 	= array_get($input, 'postcode');
		$order->address 	= array_get($input, 'address');
		$order->memo 		= array_get($input, 'memo');
		$order->update();

		Cart::updateCartItem($user, $order, ORDER_NORMAL);
	}



	public static function setOrder(User $user, $amount)
	{
		$order = new Order;
		$order->uid = $user->id;
		$order->amount = $amount;
		$order->date = strtotime(date('Y-m-d H:i:s'));
		$order->status = ORDER_UNPAY;
		$order->invoice = INVOICE_EXPRESS;
		$order->serial = substr(date("YmdHi"),2,8).mt_rand(10000,99999);
		$order->name = $user->name;
		$order->mobile = $user->mobile;
		$order->address = $user->address;
		$order->postcode = $user->postcode;
		$order->type = 0;

		if($order->save())
			return $order;
		
		return false;
	}
	
}