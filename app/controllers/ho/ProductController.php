<?php

class ProductController extends AppController {

	
    public function getAdd()
    {
        $type = Param::where('type','=','product_type')->lists('value','key');
        $category = Param::where('type','=','product_category')->lists('value','key');
        return View::make($this->views, compact('type','category'));
    }


    public function postAdd()
    {
        $result = Product::setProduct(Input::all());

        if($result){
            return Redirect::route('ho.product.add')->with(Flash::success(Lang('Product added successful.')));
        }
    }

    public function getItem()
    {        
        $products = Product::all();
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
        return View::make($this->views, compact('products'));

    }



    public function getItemImage()
    {        
        $products = Product::all();
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
        return View::make($this->views, compact('products'));

    }

    
    public function getEdit( $id = NULL )
    {     
        $product = Product::find($id);
        $type = Param::where('type','=','product_type')->lists('value','key');
        $category = Param::where('type','=','product_category')->lists('value','key');
        return View::make($this->views, compact('product','type','category'));
    }



    public function postEdit( $id = NULL )
    {   
        if(isset($id)){
            
            $input = Input::all();
            $product = Product::find($id);
            $result = Product::editProduct($product, $input);
            
            if($result){
                return Redirect::route('ho.product.edit', $id)->with(Flash::success(Lang('Product modified successful.')));
            }
        }

    }


    

}
