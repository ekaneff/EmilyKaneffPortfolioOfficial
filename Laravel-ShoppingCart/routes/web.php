<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [
	'uses' => 'ProductController@getIndex',
	'as' => 'product.index'
]);
 
Route::get('/signup', ['middleware' => 'guest'] ,function() {
	return view('user.signup');
});

Route::get('/login', ['middleware' => 'guest'] ,function() {
	return view('user.login');
});

Route::get('/cart', ['middleware' => 'auth'], function() {
	return view('shop.cart');
});

Route::get('/confirm', ['middleware' => 'auth'], function() {
	return view('shop.confirmation');
});

Route::get('/orders', ['uses' => 'HomeController@index', 'middleware' => 'auth']);

// // Auth::routes();

// Route::get('/home', 'HomeController@index');

Auth::routes();

// Route::get('/home', 'HomeController@index');

Route::group(['prefix' => 'cart'], function () {

	Route::get('/', 'CartController@index');

	Route::post('/checkout', 'CartController@checkout');

	Route::post('/charge', 'CartController@charge');

    Route::post('add', 'CartController@add');

    Route::post('remove', 'CartController@remove');

});
