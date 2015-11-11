<?php

Route::get('/','HomeController@getIndex');
Route::get('/about','HomeController@getAbout');
Route::get('/terms-conditions','HomeController@getTermsConditions');
Route::controller('cart','CartController');

Route::get('/product','ProductController@getIndex');
Route::get('/product/addcart','ProductController@getAddProductCart');
Route::get('/product/ajaxaddtocart','ProductController@getAjaxAddtocart');
Route::get('/product/removecart','ProductController@getRemoveProductCart');
Route::get('/product/details/{slug}','ProductController@getSingle');

Route::post('/product/payment',array('as'=>'payment','uses'=>'PaymentController@getPaymentCart'));
Route::get('/product/payment/return','PaymentController@getPaymentReturn');

Route::controller('register','RegisterController');
Route::controller('contact','ContactController');

Route::get('/admin','AdminController@getIndex');
Route::post('/admin/login',array('as'=>'admin.login','uses'=>'UserController@handlerLoginAdmin'));
Route::get('/admin/logout','UserController@handlerLogoutAdmin');

Route::group(
    array(
        'prefix' => 'admin',
         'before' => 'admin_auth'
    ),
    function(){
        Route::get('/dashboard','AdminController@getDashboard');

        Route::get('/tag/edit','TagController@getAjaxTag');
        Route::post('/tag/edit/save',array('as'=>'tag.edit.save','uses'=>'TagController@doEdit'));
        Route::post('/tag/save',array('as'=>'tag.save','uses'=>'TagController@doNewTag'));
        Route::post('/tag/active',array('as'=>'tag.active','uses'=>'TagController@doActive'));
        Route::post('/tag/disable',array('as'=>'tag.disable','uses'=>'TagController@doDisable'));

        Route::get('/product/{slug}','ProductController@getProduct');

        Route::get('/product/{slug}/new','ProductController@newProduct');
        Route::post('/product/{slug}/new/save',array('as'=>'product.new.save','uses'=>'ProductController@saveNewProduct'));

        Route::get('/product/{slug}/edit','ProductController@editProduct');
        Route::post('/product/{slug}/edit/save',array('as'=>'product.edit.save','uses'=>'ProductController@saveEditProduct'));

        Route::post('/product/delete',array('as'=>'product.delete','uses'=>'ProductController@deleteProduct'));
        Route::post('/product/disable',array('as'=>'product.disable','uses'=>'ProductController@disableProduct'));
        Route::post('/product/active',array('as'=>'product.active','uses'=>'ProductController@activeProduct'));
    }
);