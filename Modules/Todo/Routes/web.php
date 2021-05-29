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

Route::prefix('admin/todo')->group(function() {
    Route::get('/', 'TodoController@index')->name('Admin.Todo');
    Route::get('/create', 'TodoController@create')->name('Admin.Todo.create');
    Route::get('/edit/{item}', 'TodoController@edit')->name('Admin.Todo.edit');
    Route::post('/store', 'TodoController@store')->name('Admin.Todo.store');
    Route::post('/update', 'TodoController@update')->name('Admin.Todo.update');
    Route::delete('/delete/{item}', 'TodoController@delete')->name('Admin.Todo.delete');

});
