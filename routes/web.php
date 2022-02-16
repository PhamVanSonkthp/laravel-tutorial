<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/admin', 'App\Http\Controllers\AdminController@loginAdmin');
Route::post('/admin', 'App\Http\Controllers\AdminController@postLoginAdmin');

Route::get('/home', function () {
    return view('home');
});

Route::prefix('admin')->group(function () {
    Route::prefix('categories')->group(function () {
        Route::get('/', [
            'as'=>'categories.index',
            'uses'=>'App\Http\Controllers\CategoryController@index',
        ]);

        Route::get('/create', [
            'as'=>'categories.create',
            'uses'=>'App\Http\Controllers\CategoryController@create',
        ]);

        Route::post('/store', [
            'as'=>'categories.store',
            'uses'=>'App\Http\Controllers\CategoryController@store',
        ]);

        Route::get('/edit/{id}', [
            'as'=>'categories.edit',
            'uses'=>'App\Http\Controllers\CategoryController@edit',
        ]);

        Route::put('/update/{id}', [
            'as'=>'categories.update',
            'uses'=>'App\Http\Controllers\CategoryController@update',
        ]);

        Route::get('/delete/{id}', [
            'as'=>'categories.delete',
            'uses'=>'App\Http\Controllers\CategoryController@delete',
        ]);

    });

    Route::prefix('menus')->group(function () {
        Route::get('/', [
            'as'=>'menus.index',
            'uses'=>'App\Http\Controllers\MenuController@index',
        ]);

        Route::get('/create', [
            'as'=>'menus.create',
            'uses'=>'App\Http\Controllers\MenuController@create',
        ]);

        Route::post('/store', [
            'as'=>'menus.store',
            'uses'=>'App\Http\Controllers\MenuController@store',
        ]);

        Route::get('/edit/{id}', [
            'as'=>'menus.edit',
            'uses'=>'App\Http\Controllers\MenuController@edit',
        ]);

        Route::put('/update/{id}', [
            'as'=>'menus.update',
            'uses'=>'App\Http\Controllers\MenuController@update',
        ]);

        Route::get('/delete/{id}', [
            'as'=>'menus.delete',
            'uses'=>'App\Http\Controllers\MenuController@delete',
        ]);

    });

    Route::prefix('products')->group(function () {
        Route::get('/', [
            'as'=>'products.index',
            'uses'=>'App\Http\Controllers\AdminProductController@index',
        ]);

        Route::get('/create', [
            'as'=>'products.create',
            'uses'=>'App\Http\Controllers\AdminProductController@create',
        ]);

        Route::get('/edit/{id}', [
            'as'=>'products.edit',
            'uses'=>'App\Http\Controllers\AdminProductController@edit',
        ]);

        Route::post('/store', [
            'as'=>'products.store',
            'uses'=>'App\Http\Controllers\AdminProductController@store',
        ]);

        Route::put('/update/{id}', [
            'as'=>'products.update',
            'uses'=>'App\Http\Controllers\AdminProductController@update',
        ]);

        Route::get('/delete/{id}', [
            'as'=>'products.delete',
            'uses'=>'App\Http\Controllers\AdminProductController@delete',
        ]);

    });

    Route::prefix('slider')->group(function () {
        Route::get('/', [
            'as'=>'slider.index',
            'uses'=>'App\Http\Controllers\SliderAdminController@index',
        ]);

        Route::get('/create', [
            'as'=>'slider.create',
            'uses'=>'App\Http\Controllers\SliderAdminController@create',
        ]);

        Route::post('/store', [
            'as'=>'slider.store',
            'uses'=>'App\Http\Controllers\SliderAdminController@store',
        ]);

        Route::get('/edit/{id}', [
            'as'=>'slider.edit',
            'uses'=>'App\Http\Controllers\SliderAdminController@edit',
        ]);

        Route::get('/delete/{id}', [
            'as'=>'slider.delete',
            'uses'=>'App\Http\Controllers\SliderAdminController@delete',
        ]);

    });
});


