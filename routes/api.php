<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/blocks-store', 'BlockController@store')->name('blocks.store');
Route::post('/blocks-delete', 'BlockController@destroy')->name('blocks.destroy');

Route::post('/callback-store', 'CallbackController@store')->name('callback.store');
Route::post('/order-store', 'OrderController@store')->name('order.store');
Route::post('/subscription-store', 'SubscriptionController@store')->name('order.store');

Route::get('/export', 'ExportController@export')->name('export');
