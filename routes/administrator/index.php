<?php

use Illuminate\Support\Facades\Route;

Route::prefix('administrator')->group(function () {

    Route::prefix('categories')->group(function () {
        Route::get('/', [
            'as'=>'categories.index',
            'uses'=>'App\Http\Controllers\CategoryController@index',
            'middleware'=>'can:category-list',
        ]);

        Route::get('/create', [
            'as'=>'categories.create',
            'uses'=>'App\Http\Controllers\CategoryController@create',
            'middleware'=>'can:category-add',
        ]);

        Route::post('/store', [
            'as'=>'categories.store',
            'uses'=>'App\Http\Controllers\CategoryController@store',
            'middleware'=>'can:category-add',
        ]);

        Route::get('/edit/{id}', [
            'as'=>'categories.edit',
            'uses'=>'App\Http\Controllers\CategoryController@edit',
            'middleware'=>'can:category-edit',
        ]);

        Route::put('/update/{id}', [
            'as'=>'categories.update',
            'uses'=>'App\Http\Controllers\CategoryController@update',
            'middleware'=>'can:category-edit',
        ]);

        Route::get('/delete/{id}', [
            'as'=>'categories.delete',
            'uses'=>'App\Http\Controllers\CategoryController@delete',
            'middleware'=>'can:category-delete',
        ]);
    });

    Route::prefix('roles')->group(function () {
        Route::get('/', [
            'as' => 'roles.index',
            'uses' => 'App\Http\Controllers\AdminRoleController@index',
//            'middleware'=>'can:product-list',
        ]);

        Route::get('/create', [
            'as' => 'roles.create',
            'uses' => 'App\Http\Controllers\AdminRoleController@create',
        ]);

        Route::get('/edit/{id}', [
            'as' => 'roles.edit',
            'uses' => 'App\Http\Controllers\AdminRoleController@edit',
//            'middleware'=>'can:product-edit',
        ]);

        Route::post('/store', [
            'as' => 'roles.store',
            'uses' => 'App\Http\Controllers\AdminRoleController@store',
        ]);

        Route::put('/update/{id}', [
            'as' => 'roles.update',
            'uses' => 'App\Http\Controllers\AdminRoleController@update',
        ]);

        Route::get('/delete/{id}', [
            'as' => 'roles.delete',
            'uses' => 'App\Http\Controllers\AdminRoleController@delete',
        ]);

    });
});
