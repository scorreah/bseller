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

// Home Routes
Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');

// Bid Routes
Route::get('/bids', 'App\Http\Controllers\BidRuleController@index')->name('bid.index');
Route::get('/bids/create', 'App\Http\Controllers\BidRuleController@create')->name('bid.create');
Route::post('/bids/store', 'App\Http\Controllers\BidRuleController@store')->name('bid.store');
Route::get('/bids/list', 'App\Http\Controllers\BidRuleController@list')->name('bid.list');
Route::delete('/bids/delete/{bid}', 'App\Http\Controllers\BidRuleController@delete')->name('bid.delete');
Route::get('/bids/{id}', 'App\Http\Controllers\BidRuleController@show')->where('id', '[0-9]+')->name('bid.show');

// Shoe Routes
Route::get('/shoe', 'App\Http\Controllers\ShoeController@index')->name('shoe.index');
Route::get('/shoe/create', 'App\Http\Controllers\ShoeController@create')->name('shoe.create');
Route::get('/shoe/list', 'App\Http\Controllers\ShoeController@list')->name('shoe.list');
Route::post('/shoe/save', 'App\Http\Controllers\ShoeController@save')->name('shoe.save');
Route::delete('/shoe/delete/{id}', 'App\Http\Controllers\ShoeController@delete')->where('id', '[0-9]+')->name('shoe.delete');
Route::get('/shoe/{id}', 'App\Http\Controllers\ShoeController@show')->where('id', '[0-9]+')->name('shoe.show');
