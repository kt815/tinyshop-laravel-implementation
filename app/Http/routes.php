<?php

use App\User;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

	Route::get('/', ['uses' => 'IndexController@index']);
	Route::get('/item/{id}', ['uses' => 'IndexController@getItem']);
	Route::get('/catalog', ['uses' => 'CategoryController@index']);
	Route::get('/catalog/{id}', ['uses' => 'CategoryController@getItemsInCategoryId']);
	Route::get('/reviews', ['uses' => 'ReviewController@index']);

	Route::get('/adminbar', function () {return redirect('adminbar/showorders');});
	Route::get('/adminbar/showorders', ['uses' => 'AdminController@showorders']);
	Route::get('/adminbar/showorders/{confirm}', ['uses' => 'AdminController@showorders']);
	Route::get('/adminbar/adduser', ['uses' => 'AdminController@adduser']);
	Route::get('/adminbar/addcategory', ['uses' => 'AdminController@addcategory']);
	Route::get('/adminbar/addbrand', ['uses' => 'AdminController@addbrand']);
	Route::get('/adminbar/additem', ['uses' => 'AdminController@additem']);
	Route::get('/adminbar/order/{order_id}', ['uses' => 'AdminController@showOrder']);
	Route::post('/confirm/{order_id}', ['uses' => 'AdminController@confirmOrder']);
	Route::post('/delorder/{order_id}', ['uses' => 'AdminController@deleteOrder']);
	Route::post('/registrate', ['uses' => 'AdminController@registrateUser']);
	Route::post('/addcategory', ['uses' => 'AdminController@postAddCategory']);
	Route::post('/addbrand', ['uses' => 'AdminController@postAddBrand']);
	Route::post('/additem', ['uses' => 'AdminController@postAddItem']);

	Route::auth();
	Route::get('/home', 'HomeController@index');
	Route::get('/login', ['uses' => 'Auth\AuthController@getLogin']);
	Route::post('/login', ['uses' => 'Auth\AuthController@login']);

	Route::get('/registration', ['uses' => 'Auth\AuthController@getRegister']);
	Route::post('/registration', ['uses' => 'Auth\AuthController@postRegister']);

	Route::get('/cart', ['uses' => 'CartController@index']);

	Route::get('/cart', ['uses' => 'CartController@index']);
	Route::get('/checkout', ['uses' => 'CartController@checkout']);	

	Route::post('/addtocart/{id}', ['uses' => 'CartController@addToCart']);
	Route::post('/delfromcart/{id}', ['uses' => 'CartController@deleteItemFromCart']);
	Route::post('/addreview', ['uses' => 'ReviewController@addReview']);
	Route::post('/checkout', ['uses' => 'CartController@postCheckout']);

