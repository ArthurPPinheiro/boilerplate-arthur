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

Route::prefix('admin/teste2')->group(function() {
    Route::get('/', 'Teste2Controller@index');
    Route::get('/create', 'Teste2Controller@create');
    Route::get('/edit', 'Teste2Controller@edit');
    Route::post('/store', 'Teste2Controller@store');
    Route::post('/update/{id}', 'Teste2Controller@update');
});
