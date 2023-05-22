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

Route::middleware(AdminAuthMiddleware::class)->group(function () {
    // Admin routes
    Route::get('/admin/dashboard', 'App\Http\Controllers\AdminController@index')->name('admin.dashboard');
    // Admin routes-shoe
    Route::get('/admin/shoes', 'App\Http\Controllers\AdminShoeController@index')->name('admin.shoes');
    Route::get('/admin/shoes/create', 'App\Http\Controllers\AdminShoeController@create')->name('admin.shoeCreate');
    Route::get('/admin/shoes/list', 'App\Http\Controllers\AdminShoeController@list')->name('admin.shoeList');
    Route::post('/admin/shoes/save', 'App\Http\Controllers\AdminShoeController@save')->name('admin.shoeSave');
    Route::delete('/admin/shoes/delete/{id}', 'App\Http\Controllers\AdminShoeController@delete')->where('id', '[0-9]+');
    Route::get('/admin/shoes/{id}', 'App\Http\Controllers\AdminShoeController@show')->where('id', '[0-9]+');

    // Admin routes-Order
    Route::get('/admin/orders', 'App\Http\Controllers\AdminOrderController@index')->name('admin.orders');
    Route::get('/admin/orders/create', 'App\Http\Controllers\AdminOrderController@create')->name('admin.orderCreate');
    Route::post('/admin/orders/store', 'App\Http\Controllers\AdminOrderController@store')->name('admin.orderStore');
    Route::get('/admin/orders/list', 'App\Http\Controllers\AdminOrderController@list')->name('admin.orderList');
    Route::delete('/admin/orders/delete/{order}', 'App\Http\Controllers\AdminOrderController@delete')->name('admin.orderDelete');
    Route::get('/admin/orders/show/{id}', 'App\Http\Controllers\AdminOrderController@show')->name('admin.orderShow');

    // Admin routes-Bid
    Route::get('/admin/bids', 'App\Http\Controllers\AdminBidRuleController@index')->name('admin.bids');
    Route::get('/admin/bids/create', 'App\Http\Controllers\AdminBidRuleController@create')->name('admin.bidCreate');
    Route::post('/admin/bids/store', 'App\Http\Controllers\AdminBidRuleController@store')->name('admin.bidStore');
    Route::get('/admin/bids/list', 'App\Http\Controllers\AdminBidRuleController@list')->name('admin.bidList');
    Route::delete('/admin/bids/delete/{id}', 'App\Http\Controllers\AdminBidRuleController@delete')->name('admin.bidDelete');
    Route::get('/admin/bids/{id}', 'App\Http\Controllers\AdminBidRuleController@show')->where('id', '[0-9]+')->name('admin.bidShow');
});

Route::middleware(Authenticate::class)->group(function () {

    // Profile Routes
    Route::get('/profile', 'App\Http\Controllers\ProfileController@show')->name('profile.show');

    //PayMethods Routes
    Route::post('/paypal/pay', 'App\Http\Controllers\PaymentController@payWithPaypal')->name('payment.payWithPaypal');
    Route::get('/paypal/status', 'App\Http\Controllers\PaymentController@payStatus')->name('payment.payStatus');

    // Bid Routes
    Route::post('/bids/bidup/{id}', 'App\Http\Controllers\BidController@store')->where('id', '[0-9]+')->name('bid.up');

    // Order Routes
    Route::get('/orders', 'App\Http\Controllers\OrderController@index')->name('order.index');
    Route::get('/orders/show/{id}', 'App\Http\Controllers\OrderController@show')->name('order.show');
    Route::get('/orders/bill/{id}', 'App\Http\Controllers\OrderController@downloadPdf')->name('order.pdf');

    // Cart Routes
    Route::get('/cart', 'App\Http\Controllers\CartController@index')->name('cart.index');
    Route::get('/cart/delete', 'App\Http\Controllers\CartController@delete')->name('cart.delete');
    Route::get('/cart/add/{id}', 'App\Http\Controllers\CartController@add')->name('cart.add');
    Route::get('/cart/purchase', 'App\Http\Controllers\CartController@purchase')->name('cart.purchase');
});

// Home Routes
Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');

// Bid Routes
Route::get('/bids', 'App\Http\Controllers\BidRuleController@index')->name('bid.index');
Route::get('/bids/{id}', 'App\Http\Controllers\BidRuleController@show')->where('id', '[0-9]+')->name('bid.show');

// Shoe Routes
Route::get('/shoes', 'App\Http\Controllers\ShoeController@index')->name('shoe.index');
Route::get('/shoes/{id}', 'App\Http\Controllers\ShoeController@show')->where('id', '[0-9]+')->name('shoe.show');

// Language Routes
Route::post('/lang', 'App\Http\Controllers\LangController@locale')->name('lang.locale');

// Api External Routes
Route::get('/api/items', 'App\Http\Controllers\ExternalApiController@show')->name('api.show');
Auth::routes();
