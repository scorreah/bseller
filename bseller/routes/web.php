<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminAuthMiddleware;

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

// Home Routes
Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');

// Bid Routes
Route::get('/bids', 'App\Http\Controllers\BidRuleController@index')->name('bid.index');
Route::get('/bids/create', 'App\Http\Controllers\BidRuleController@create')->name('bid.create')->middleware(AdminAuthMiddleware::class);
Route::post('/bids/store', 'App\Http\Controllers\BidRuleController@store')->name('bid.store');
Route::get('/bids/list', 'App\Http\Controllers\BidRuleController@list')->name('bid.list');
Route::delete('/bids/delete/{bid}', 'App\Http\Controllers\BidRuleController@delete')->name('bid.delete');
Route::get('/bids/{id}', 'App\Http\Controllers\BidRuleController@show')->where('id', '[0-9]+')->name('bid.show');

// Shoe Routes
Route::get('/shoes', 'App\Http\Controllers\ShoeController@index')->name('shoe.index');
Route::get('/shoes/create', 'App\Http\Controllers\ShoeController@create')->name('shoe.create');
Route::get('/shoes/list', 'App\Http\Controllers\ShoeController@list')->name('shoe.list');
Route::post('/shoes/save', 'App\Http\Controllers\ShoeController@save')->name('shoe.save');
Route::delete('/shoes/delete/{id}', 'App\Http\Controllers\ShoeController@delete')->where('id', '[0-9]+')->name('shoe.delete');
Route::get('/shoes/{id}', 'App\Http\Controllers\ShoeController@show')->where('id', '[0-9]+')->name('shoe.show');

// Order Routes
Route::get('/orders', 'App\Http\Controllers\OrderController@index')->name('order.index');
Route::get('/orders/create', 'App\Http\Controllers\OrderController@create')->name('order.create');
Route::post('/orders/store', 'App\Http\Controllers\OrderController@store')->name('order.store');
Route::get('/orders/list', 'App\Http\Controllers\OrderController@list')->name('order.list');
Route::delete('/orders/delete/{order}', 'App\Http\Controllers\OrderController@delete')->name('order.delete');
Route::get('/orders/show/{id}', 'App\Http\Controllers\OrderController@show')->name('order.show');

Auth::routes();

