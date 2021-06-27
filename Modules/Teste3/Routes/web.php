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

Route::prefix('admin/teste3')->group(function() {
    Route::get('/', 'Teste3Controller@index')->name('Admin.Teste3');
    Route::get('/create', 'Teste3Controller@create')->name('Admin.Teste3.create');
    Route::get('/edit/{teste3}', 'Teste3Controller@edit')->name('Admin.Teste3.edit');
    Route::post('/store', 'Teste3Controller@store')->name('Admin.Teste3.store');
    Route::put('/update/{teste3}', 'Teste3Controller@update')->name('Admin.Teste3.update');
    Route::get('/delete/{teste3}', 'Teste3Controller@destroy')->name('Admin.Teste3.delete');
});
