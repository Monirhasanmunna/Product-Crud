<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('index','ProductController@index')->name('index');
Route::get('add_product','ProductController@addform');
Route::post('store','ProductController@store')->name('store');
Route::get('product/details/{id}', 'ProductController@show')->name('show');
Route::get('edit/details/{id}', 'ProductController@edit')->name('edit');
Route::post('product/update/{id}','ProductController@update')->name('update');
Route::get('delete/details/{id}', 'ProductController@delete')->name('delete');

