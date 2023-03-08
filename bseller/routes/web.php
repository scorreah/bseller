<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Rutas del home
Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');

// Rutas de Orders
Route::get('/orders', 'App\Http\Controllers\OrdersController@index')->name('orders.index');
Route::get('/orders/create', 'App\Http\Controllers\OrdersController@create')->name('orders.create');
Route::post('/orders/store', 'App\Http\Controllers\OrdersController@store')->name('orders.store');
Route::get('/orders/list', 'App\Http\Controllers\OrdersController@list')->name('orders.list');
Route::delete('/orders/delete/{order}', 'App\Http\Controllers\OrdersController@delete')->name('orders.delete');
Route::get('/orders/show/{id}', 'App\Http\Controllers\OrdersController@show')->name('orders.show');
