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

Route::prefix('admin')->group(function() {
    Route::get('/', 'AdminController@index');
    Route::get('/dashboard', 'AdminController@dashboard');
    Route::get('/icons', 'AdminController@icons');
    Route::get('/login', 'AdminController@login');
    Route::get('/map', 'AdminController@map');
    Route::get('/maps', 'AdminController@maps');
    Route::get('/profile', 'AdminController@profile');
    Route::get('/register', 'AdminController@register');
    Route::get('/tables', 'AdminController@tables');
    Route::get('/upgrades', 'AdminController@upgrades');
});
