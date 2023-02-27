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

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');
Route::get('/shoe', 'App\Http\Controllers\ShoeController@index')->name('shoe.index');
Route::get('/shoe/create', 'App\Http\Controllers\ShoeController@create')->name('shoe.create');
Route::get('/shoe/list', 'App\Http\Controllers\ShoeController@list')->name('shoe.list');
Route::post('/shoe/save', 'App\Http\Controllers\ShoeController@save')->name('shoe.save');
Route::delete('/shoe/delete/{id}', 'App\Http\Controllers\ShoeController@delete')->name('shoe.delete');
Route::get('/shoe/{id}', 'App\Http\Controllers\ShoeController@show')->name('shoe.show');