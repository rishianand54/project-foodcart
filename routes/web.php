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

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/home/{category?}', 'HomeController@show');

Route::get('/product/{product}', 'ProductController@index');
Route::post('/product/{product}', 'ProductController@addToBasket');

Route::get('/order', 'OrderController@index');
Route::get('/order/confirm', 'OrderController@confirmOrder');
Route::get('/order/update/{order}', 'OrderController@updateBasket');

Route::get('/user', 'UserController@index');
Route::get('/user/edit-address', 'UserController@changeAddress');
Route::post('/user/edit-address', 'UserController@updateAddress');
