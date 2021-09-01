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

Route::group(['prefix' => 'admin/productcategories', 'middleware' => ['auth', 'web']], function() {
    Route::get('/', 'ProductCategoriesController@index')->name('Admin.ProductCategories');
    Route::get('/create', 'ProductCategoriesController@create')->name('Admin.ProductCategories.create');
    Route::get('/edit/{productcategories}', 'ProductCategoriesController@edit')->name('Admin.ProductCategories.edit');
    Route::post('/store', 'ProductCategoriesController@store')->name('Admin.ProductCategories.store');
    Route::put('/update/{productcategories}', 'ProductCategoriesController@update')->name('Admin.ProductCategories.update');
    Route::delete('/delete/{productcategories}', 'ProductCategoriesController@destroy')->name('Admin.ProductCategories.delete');
});
