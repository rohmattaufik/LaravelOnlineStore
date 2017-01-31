<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| 	/ --> show list products
| 	/product/{slug} --> show specified products
| 	/order --> show list orers by user active
| 	/order/order_number/{id} --> show specified order
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'ProductsController@index');

Route::get('/products/{slug}', 'ProductsController@show');


Route::get('/order/{id}', 'OrderController@index');

Route::get('/order/order_number/{id}', 'OrderController@show');

/*
Route::get('/product/cart/{id}', 'CartController@getAddToCart');

Route::get('/product/cart', 'CartController@getCart');

Route::get('/remove/{id}', 'CartController@getRemoveItem');

Route::post('/change_qty/{id}', 'CartController@changeQtyItem');

Route::get('/checkout', 'CartController@getCheckout');

Route::group(['middleware' => ['web']], function(){

});
*/

//Route::resource('products', 'ProductsController');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
