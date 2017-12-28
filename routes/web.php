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

Route::get('/', 'HomeController@index')->name('home');
Route::resource('gigs', 'GigController', ['except' => 'index']);
Route::resource('purchases', 'PurchaseController');
Route::get('my_orders', 'PurchaseController@orders')->name('my_orders');
Route::get('my_orders/{order}', 'PurchaseController@show_single')->name('show_single');
Route::get('my_sellings', 'PurchaseController@sellings')->name('my_sellings');
Route::get('/my_gigs', 'GigController@index')->name('my_gigs');
Route::get('/user/{name}', 'ProfileController@user_profile')->name('profile');
Route::put('/user/{id}', 'ProfileController@update')->name('profile.update');