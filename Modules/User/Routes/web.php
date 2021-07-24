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

Route::prefix('admin/user')->group(function() {
    Route::get('/', 'UserController@index')->name('Admin.User');
    Route::get('/create', 'UserController@create')->name('Admin.User.create');
    Route::get('/edit/{user}', 'UserController@edit')->name('Admin.User.edit');
    Route::post('/store', 'UserController@store')->name('Admin.User.store');
    Route::put('/update/{user}', 'UserController@update')->name('Admin.User.update');
    Route::delete('/delete/{user}', 'UserController@destroy')->name('Admin.User.delete');
});
