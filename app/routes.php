<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::get('/', array('as' => 'default.index', 'uses' => 'DefaultController@index'));

Route::get('login', array('uses' => 'DefaultController@index'));
Route::post('login', array('as' => 'login', 'uses' => 'DefaultController@postLogin'));
Route::get('register', array('as' => 'default.register', 'uses' => 'DefaultController@getRegister'));
Route::post('register', array('uses' => 'DefaultController@postRegister'));
Route::post('invate', array('as' => 'default.invate','uses' => 'DefaultController@postInvate'));
Route::get('active', array('as' => 'default.active', 'uses' => 'DefaultController@getActive'));
Route::post('active', array('uses' => 'DefaultController@postActived'));
Route::get('sendemail', array('as' => 'default.sendemail', 'uses' => 'DefaultController@getSendemail'));
Route::post('sendemail', array('uses' => 'DefaultController@postSendemail'));



Route::group(array('before' => 'auth'), function()
{
	Route::any('logout', array('as' => 'logout', 'uses' => 'DefaultController@logout'));
	Route::any('portal', array('as' => 'default.portal', 'uses' => 'DefaultController@portal'));

    Route::group(array('prefix' => 'setup'),function()
    {       
      Route::get('profile', array('as' => 'setup.profile', 'uses' => 'SetupController@getProfile'));
      Route::post('profile', array('uses' => 'SetupController@postProfile'));
      Route::get('password', array('as' => 'setup.password', 'uses' => 'SetupController@getPassword'));
      Route::post('password', array('uses' => 'SetupController@postPassword'));
      Route::get('password2', array('as' => 'setup.password2', 'uses' => 'SetupController@getPassword2'));
      Route::post('password2', array('uses' => 'SetupController@postPassword2'));

    });


     //branch office
    Route::group(array('prefix' => 'bo', 'before' => 'BO'),function()
    {
      Route::get('account/register', array('as' => 'bo.account.register', 'uses' => 'AccountController@getRegister'));
      Route::post('account/register', array('uses' => 'AccountController@postRegister'));

      Route::get('account/active', array('as' => 'bo.account.active', 'uses' => 'AccountController@getActive'));
      Route::post('account/active', array('uses' => 'AccountController@postActive'));

      Route::get('account/modify/{id}', array('as' => 'bo.account.modify', 'uses' => 'AccountController@getModify'));
      Route::post('account/modify/{id}', array('uses' => 'AccountController@postModify'));
       
      Route::get('account/charge', array('as' => 'bo.account.charge', 'uses' => 'AccountController@getCharge'));
      Route::post('account/charge', array('uses' => 'AccountController@postCharge'));

      Route::get('shop/list', array('as' => 'bo.shop.list', 'uses' => 'ShopController@getList'));
      Route::get('shop/new', array('as' => 'bo.shop.new', 'uses' => 'ShopController@getNew'));
      Route::post('shop/new', array('uses' => 'ShopController@postNew'));
      Route::get('shop/order', array('as' => 'bo.shop.order', 'uses' => 'ShopController@getOrder'));

      Route::any('account/search', array('as' => 'bo.account.search', 'uses' => 'AccountController@getSearch'));        
      //Route::any('record/search', array('as' => 'bo.record.search', 'uses' => 'RecordController@getSearch')); 
      Route::any('settle/search', array('as' => 'bo.settle.search', 'uses' => 'SettleController@getSearch')); 
      Route::any('settle/regionsearch', array('as' => 'bo.settle.regionsearch', 'uses' => 'SettleController@getRegionSearch')); 
      Route::any('settle/shop', array('as' => 'bo.settle.shop', 'uses' => 'SettleController@getShop')); 
             
    });


    Route::group(array('prefix' => 'user', 'before' => 'USER'),function()
    {
      Route::get('item/view/{id}', array('as' => 'user.item.view', 'uses' => 'ItemController@getView')); 
      Route::get('order/item', array('as' => 'user.order.item', 'uses' => 'OrderController@getItem')); 
      Route::post('order/item', array('uses' => 'OrderController@postItem')); 
      Route::get('order/cart', array('as' => 'user.order.cart', 'uses' => 'OrderController@getCart')); 
      Route::post('order/undo', array('as' => 'user.order.undo', 'uses' => 'OrderController@postUndo')); 
      Route::post('order/update', array('as' => 'user.order.update', 'uses' => 'OrderController@postUpdate')); 
      Route::post('order/clear', array('as' => 'user.order.clear', 'uses' => 'OrderController@postClear')); 
      Route::get('order/edit/{id}', array('as' => 'user.order.edit', 'uses' => 'OrderController@getEdit')); 
      Route::post('order/edit', array('uses' => 'OrderController@postEdit')); 
      Route::post('order/check', array('as' => 'user.order.check','uses' => 'OrderController@postCheck')); 
      Route::post('order/pay', array('as' => 'user.order.pay','uses' => 'OrderController@postPay')); 
      Route::post('order/cancel', array('as' => 'user.order.cancel','uses' => 'OrderController@postCancel')); 
      Route::get('order/bought', array('as' => 'user.order.bought','uses' => 'OrderController@getBought')); 
      Route::get('order/view/{id}', array('as' => 'user.order.view','uses' => 'OrderController@getView')); 

      Route::get('finance/detail', array('as' => 'user.finance.detail', 'uses' => 'FinanceController@getDetail')); 
      Route::get('finance/balance', array('as' => 'user.finance.balance', 'uses' => 'FinanceController@getBalance')); 

      Route::get('finance/transfer', array('as' => 'user.finance.transfer', 'uses' => 'FinanceController@getTransfer'));
      Route::post('finance/transfer', array('uses' => 'FinanceController@postTransfer'));

      Route::get('market/view', array('as' => 'user.market.view', 'uses' => 'MarketController@getView')); 
      Route::get('market/referee', array('as' => 'user.market.referee', 'uses' => 'MarketController@getReferee')); 
       
    });

   

    
    //head quarter
    Route::group(array('prefix' => 'ho', 'before' => 'HO'),function()
    {
      Route::get('branch/new', array('as' => 'ho.branch.new', 'uses' => 'BranchController@getNew'));
      Route::post('branch/new', array('uses' => 'BranchController@postNew'));

      Route::get('branch/list', array('as' => 'ho.branch.list', 'uses' => 'BranchController@getList'));
      Route::post('branch/list', array('uses' => 'BranchController@postList'));
      Route::get('branch/extra', array('as' => 'ho.branch.extra', 'uses' => 'BranchController@getExtra'));
      
      Route::get('business/transfer', array('as' => 'ho.business.transfer', 'uses' => 'BusinessController@getTransfer'));
      Route::post('business/transfer', array('uses' => 'BusinessController@postTransfer'));
      Route::get('business/reserve', array('as' => 'ho.business.reserve', 'uses' => 'BusinessController@getReserve'));
      Route::post('business/reserve', array('uses' => 'BusinessController@postReserve'));
      Route::get('business/statement', array('as' => 'ho.business.statement', 'uses' => 'BusinessController@getStatement'));
      Route::get('business/settle', array('as' => 'ho.business.settle', 'uses' => 'BusinessController@getSettle'));

      Route::get('product/itemimage', array('as' => 'ho.product.itemimage', 'uses' => 'ProductController@getItemImage'));

      Route::get('product/item', array('as' => 'ho.product.item', 'uses' => 'ProductController@getItem'));
      Route::get('product/add', array('as' => 'ho.product.add', 'uses' => 'ProductController@getAdd'));
      Route::post('product/add', array('uses' => 'ProductController@postAdd'));
      Route::get('product/edit/{id}', array('as' => 'ho.product.edit', 'uses' => 'ProductController@getEdit'));
      Route::post('product/edit/{id}', array('uses' => 'ProductController@postEdit'));

      Route::get('indent/express', array('as' => 'ho.indent.express', 'uses' => 'IndentController@getExpress'));
      Route::get('indent/shop', array('as' => 'ho.indent.shop', 'uses' => 'IndentController@getShop'));

      Route::get('indent/edit/{id}', array('as' => 'ho.indent.edit', 'uses' => 'IndentController@getEdit'));
      Route::post('indent/check', array('as' => 'ho.indent.check', 'uses' => 'IndentController@postCheck'));
      Route::post('indent/cancel', array('as' => 'ho.indent.cancel', 'uses' => 'IndentController@postCancel'));
      Route::get('indent/first', array('as' => 'ho.indent.first', 'uses' => 'IndentController@getFirst'));
      Route::post('indent/checkfirst', array('as' => 'ho.indent.checkfirst', 'uses' => 'IndentController@postCheckfirst'));

      Route::get('member/adjust', array('as' => 'ho.member.adjust', 'uses' => 'MemberController@getAdjust'));
      Route::post('member/adjust', array('uses' => 'MemberController@postAdjust'));
      Route::get('member/query', array('as' => 'ho.member.query', 'uses' => 'MemberController@getQuery'));
      Route::post('member/query', array('as' => 'ho.member.queryresult','uses' => 'MemberController@postQuery'));
      
      Route::get('daily', array('as' => 'ho.daily', 'uses' => 'BatchController@getDaily'));
      Route::post('daily', array('uses' => 'BatchController@postDaily'));
      Route::get('truncate', array('as' => 'ho.truncate', 'uses' => 'BatchController@getTruncate'));
      Route::get('menus', array('as' => 'ho.menus', 'uses' => 'BatchController@getInitMenus'));
      
    });
    
});








