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

Route::get('/', 'ProductsController@index');
Route::get('/fetch', 'ProductsController@fetch');
Route::get('/{product}/edit', 'ProductsController@edit');
Route::post('/', 'ProductsController@store');
Route::delete('/products/{product}', 'ProductsController@destroy');
Route::patch('/products/{product}', 'ProductsController@update');