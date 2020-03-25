<?php

Route::group(['middleware' => ['web']], function () {
    Route::get('/admin/matrix', 'HG\Crud\Http\Controllers\MatrixController@index')->name('matrix.index');
    Route::get('/admin/matrix/create', 'HG\Crud\Http\Controllers\MatrixController@create')->name('matrix.create');
    Route::post('/admin/matrix/store', 'HG\Crud\Http\Controllers\MatrixController@store')->defaults('_config', [
        'view' => 'crud::matrix.create',
        'redirect' => 'matrix.index'
    ])->name('matrix.store');

    Route::get('/admin/matrix/edit/{id}', 'HG\Crud\Http\Controllers\MatrixController@edit')->defaults('_config', [
        'view' => 'crud::matrix.edit'
    ])->name('matrix.edit');

    Route::put('/admin/matrix/edit/{id}', 'HG\Crud\Http\Controllers\MatrixController@update')->defaults('_config', [
        'redirect' => 'matrix.index'
    ])->name('matrix.update');

});
