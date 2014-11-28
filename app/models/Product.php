<?php

class Product extends Eloquent  {

	const CACHE_PTYPE     	= 'productTypes';
	const CACHE_PCATEGORY	= 'productCategories';
    const CACHE_MINUTES 	= 60;

	//protected $table = 'hms_product';

	protected $guarded = array();

	public $timestamps = false;

		
	public function scopeProductType($query, $type)
	{
		return $query->where('type','=',$type)->where('status','=',STATUS_NORMAL);
	}


	public function scopeSorter($query, $type, $sort, $order)
	{
		if($type && $sort)
			$query->where('status','=',STATUS_NORMAL)->where('type','=',$type)->orderBy($sort,$order);		
		elseif($type && !$sort)
			$query->where('status','=',STATUS_NORMAL)->where('type','=',$type)->orderBy('order','asc');		
		elseif( !$type && $sort)
			$query->where('status','=',STATUS_NORMAL)->orderBy($sort,$order);		
		else
			$query->where('status','=',STATUS_NORMAL)->orderBy('order','asc');
	}


	public static function setProduct($input)
	{
		$result = false;

		$product = new Product;
        $product->code = $input['code'];
        $product->name = $input['name'];
        $product->type = $input['type'];
        $product->category = $input['category'];
        $product->price1 = $input['price1'];
        $product->price2 = $input['price2'];
        $product->badge = array_key_exists('badge',$input) ? $input['badge']:0;
        $product->specs = $input['specs'];
        $product->memo = $input['memo'];
        $product->status = STATUS_NORMAL;
        
        if($product->save())
        	$result = true;
        return $result;

	}

	
	public static function editProduct(Product $product, $input)
	{
		$result = false;

		$product->code = $input['code'];
        $product->name = $input['name'];
        $product->type = $input['type'];
        $product->category = $input['category'];
        $product->price1 = $input['price1'];
        $product->price2 = $input['price2'];
        $product->badge = array_key_exists('badge',$input) ? $input['badge']:0;
        $product->specs = $input['specs'];
        $product->memo = $input['memo'];

        if($product->update())
        	$result = true;
        return $result;
	}


	public static function getParamValue($type,$key)
	{		
        if($type == 'product_type'){
        	$params = Product::getProductTypesCache();
        	foreach($params as $param){
	            if($key == $param->key)
	                return $param->value;
	        }
        }
        if($type == 'product_category'){
        	$params = Product::getProductCategoriesCache();
        	foreach($params as $param){
	            if($key == $param->key)
	                return $param->value;
	        }
        }
		
	}


	public static function getProductTypesCache()
	{		
		return Cache::remember(self::CACHE_PTYPE, self::CACHE_MINUTES, function()
        {
			return Param::ProductType('product_type')->get();
        });

	}

	public static function getProductCategoriesCache()
	{		
		return Cache::remember(self::CACHE_PCATEGORY, self::CACHE_MINUTES, function()
        {
			return Param::ProductType('product_category')->get();
        });

	}

}