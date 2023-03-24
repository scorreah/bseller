<?php

use App\Http\Middleware\AdminAuthMiddleware;
use App\Http\Middleware\Authenticate;
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

// Home Routes
Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');

// Bid Routes
Route::get('/bids', 'App\Http\Controllers\BidRuleController@index')->name('bid.index');
Route::get('/bids/create', 'App\Http\Controllers\BidRuleController@create')->name('bid.create'); //->middleware(AdminAuthMiddleware::class);
Route::post('/bids/store', 'App\Http\Controllers\BidRuleController@store')->name('bid.store');
Route::get('/bids/list', 'App\Http\Controllers\BidRuleController@list')->name('bid.list');
Route::delete('/bids/delete/{bid}', 'App\Http\Controllers\BidRuleController@delete')->name('bid.delete');
Route::get('/bids/{id}', 'App\Http\Controllers\BidRuleController@show')->where('id', '[0-9]+')->name('bid.show');
Route::post('/bids/bidup/{id}', 'App\Http\Controllers\BidController@store')->where('id', '[0-9]+')->name('bid.up');

// Shoe Routes
Route::get('/shoes', 'App\Http\Controllers\ShoeController@index')->name('shoe.index');
Route::get('/shoes/create', 'App\Http\Controllers\ShoeController@create')->name('shoe.create');
Route::get('/shoes/list', 'App\Http\Controllers\ShoeController@list')->name('shoe.list');
Route::post('/shoes/save', 'App\Http\Controllers\ShoeController@save')->name('shoe.save');
Route::delete('/shoes/delete/{id}', 'App\Http\Controllers\ShoeController@delete')->where('id', '[0-9]+')->name('shoe.delete');
Route::get('/shoes/{id}', 'App\Http\Controllers\ShoeController@show')->where('id', '[0-9]+')->name('shoe.show');

// Order Routes
Route::get('/orders', 'App\Http\Controllers\OrderController@index')->name('order.index')->middleware(Authenticate::class);
Route::get('/orders/create', 'App\Http\Controllers\OrderController@create')->name('order.create')->middleware(Authenticate::class);
Route::post('/orders/store', 'App\Http\Controllers\OrderController@store')->name('order.store')->middleware(Authenticate::class);
Route::get('/orders/list', 'App\Http\Controllers\OrderController@list')->name('order.list')->middleware(Authenticate::class);
Route::delete('/orders/delete/{order}', 'App\Http\Controllers\OrderController@delete')->name('order.delete')->middleware(Authenticate::class);
Route::get('/orders/show/{id}', 'App\Http\Controllers\OrderController@show')->name('order.show')->middleware(Authenticate::class);

// Cart Routes
Route::get('/cart', 'App\Http\Controllers\CartController@index')->name("cart.index")->middleware(Authenticate::class); 
Route::get('/cart/delete', 'App\Http\Controllers\CartController@delete')->name("cart.delete")->middleware(Authenticate::class); 
Route::get('/cart/add/{id}', 'App\Http\Controllers\CartController@add')->name("cart.add")->middleware(Authenticate::class);
Route::get('/cart/purchase', 'App\Http\Controllers\CartController@purchase')->name("cart.purchase")->middleware(Authenticate::class);

// Language Routes
Route::post('/lang', 'App\Http\Controllers\LangController@locale')->name('lang.locale');

Auth::routes();
