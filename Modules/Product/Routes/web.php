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

Route::group(['prefix' => 'admin/product', 'middleware' => ['web', 'auth']], function() {
    Route::get('/', 'ProductController@index')->name('Admin.Product');
    Route::get('/create', 'ProductController@create')->name('Admin.Product.create');
    Route::get('/edit/{product}', 'ProductController@edit')->name('Admin.Product.edit');
    Route::post('/store', 'ProductController@store')->name('Admin.Product.store');
    Route::put('/update/{product}', 'ProductController@update')->name('Admin.Product.update');
    Route::delete('/delete/{product}', 'ProductController@destroy')->name('Admin.Product.delete');
});
