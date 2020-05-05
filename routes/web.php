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


App::setLocale('hy');


Route::group(['middleware' => ['web', 'theme', 'locale', 'currency']], function () {
    Route::get('/products', 'IndexController@products')->defaults('_config', [ 'view' => 'products' ])->name('products');
    Route::get('/matrix', 'IndexController@matrix')->defaults('_config', [ 'view' => 'matrix' ])->name('matrix');
});