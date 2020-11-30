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

Route::get('/', 'OrderController@index');
Route::get('orders/edit/{order}', 'OrderController@edit')->name('orders.edit');
Route::post('orders/edit/{order}', 'OrderController@update')->name('orders.update');
Route::get('orders/{type?}', 'OrderController@index')->name('orders');

Route::get('weather', 'WeatherController@index')->name('weather');
