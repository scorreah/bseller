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
Route::get('/bids/{id}', 'App\Http\Controllers\BidRuleController@show')->where('id', '[0-9]+')->name('bid.show');
Route::post('/bids/bidup/{id}', 'App\Http\Controllers\BidController@store')->where('id', '[0-9]+')->name('bid.up');

// Shoe Routes
Route::get('/shoes', 'App\Http\Controllers\ShoeController@index')->name('shoe.index');
Route::get('/shoes/{id}', 'App\Http\Controllers\ShoeController@show')->where('id', '[0-9]+')->name('shoe.show');

// Order Routes
Route::get('/orders', 'App\Http\Controllers\OrderController@index')->name('order.index')->middleware(Authenticate::class);
Route::get('/orders/show/{id}', 'App\Http\Controllers\OrderController@show')->name('order.show')->middleware(Authenticate::class);

// Cart Routes
Route::get('/cart', 'App\Http\Controllers\CartController@index')->name('cart.index')->middleware(Authenticate::class);
Route::get('/cart/delete', 'App\Http\Controllers\CartController@delete')->name('cart.delete')->middleware(Authenticate::class);
Route::get('/cart/add/{id}', 'App\Http\Controllers\CartController@add')->name('cart.add')->middleware(Authenticate::class);
Route::get('/cart/purchase', 'App\Http\Controllers\CartController@purchase')->name('cart.purchase')->middleware(Authenticate::class);

// Language Routes
Route::post('/lang', 'App\Http\Controllers\LangController@locale')->name('lang.locale');

// Admin routes-shoe
Route::get('/admin/dashboard', 'App\Http\Controllers\AdminController@index')->name('admin.dashboard');
Route::get('/admin/shoes/create', 'App\Http\Controllers\AdminShoeController@create')->name('admin.shoeCreate')->middleware(AdminAuthMiddleware::class);
Route::get('/admin/shoes/list', 'App\Http\Controllers\AdminShoeController@list')->name('admin.shoeList')->middleware(AdminAuthMiddleware::class);
Route::post('/admin/shoes/save', 'App\Http\Controllers\AdminShoeController@save')->name('admin.shoeSave')->middleware(AdminAuthMiddleware::class);
Route::delete('/admin/shoes/delete/{id}', 'App\Http\Controllers\AdminShoeController@delete')->where('id', '[0-9]+')->name('admin.shoeDelete')->middleware(AdminAuthMiddleware::class);
Route::get('/admin/shoes/{id}', 'App\Http\Controllers\AdminShoeController@show')->where('id', '[0-9]+')->name('admin.shoeShow')->middleware(AdminAuthMiddleware::class);

// Admin routes-Order
Route::get('/admin/orders/create', 'App\Http\Controllers\AdminOrderController@create')->name('admin.orderCreate')->middleware(AdminAuthMiddleware::class);
Route::post('/admin/orders/store', 'App\Http\Controllers\AdminOrderController@store')->name('admin.orderStore')->middleware(AdminAuthMiddleware::class);
Route::get('/admin/orders/list', 'App\Http\Controllers\AdminOrderController@list')->name('admin.orderList')->middleware(AdminAuthMiddleware::class);
Route::delete('/admin/orders/delete/{order}', 'App\Http\Controllers\AdminOrderController@delete')->name('admin.orderDelete')->middleware(AdminAuthMiddleware::class);
Route::get('/admin/orders/show/{id}', 'App\Http\Controllers\AdminOrderController@show')->name('admin.orderShow')->middleware(AdminAuthMiddleware::class);

// Admin routes-Bid
Route::get('/admin/bids/create', 'App\Http\Controllers\AdminBidRuleController@create')->name('admin.bidCreate')->middleware(AdminAuthMiddleware::class);
Route::post('/admin/bids/store', 'App\Http\Controllers\AdminBidRuleController@store')->name('admin.bidStore')->middleware(AdminAuthMiddleware::class);
Route::get('/admin/bids/list', 'App\Http\Controllers\AdminBidRuleController@list')->name('admin.bidList')->middleware(AdminAuthMiddleware::class);
Route::delete('/admin/bids/delete/{id}', 'App\Http\Controllers\AdminBidRuleController@delete')->name('admin.bidDelete')->middleware(AdminAuthMiddleware::class);
Route::get('/admin/bids/{id}', 'App\Http\Controllers\AdminBidRuleController@show')->where('id', '[0-9]+')->name('admin.bidShow')->middleware(AdminAuthMiddleware::class);

Auth::routes();
