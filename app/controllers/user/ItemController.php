<?php

class ItemController extends AppController {

	public function getView($id = null)
	{
		$product = Product::find($id);

		if(!$product)
			return Redirect::route('user.order.item')->with(Flash::error(Lang('Can\'t find product.')));

		$arrType = Product::getProductTypesCache();
        $arrCategory = Product::getProductCategoriesCache();
        
        
        foreach($arrType as $type){
            if($product->type == $type->key)
                $product->type = $type->value;
        }
        foreach($arrCategory as $category){
            if($product->category == $category->key)
                $product->category = $category->value;
        }
        
		//dd($product);
		return View::make($this->views, compact('product'));
	}


}