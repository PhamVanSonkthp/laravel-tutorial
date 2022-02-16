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
            'middleware'=>'can:category-edt',
        ]);

        Route::put('/update/{id}', [
            'as'=>'categories.update',
            'uses'=>'App\Http\Controllers\CategoryController@update',
            'middleware'=>'can:category-edt',
        ]);

        Route::get('/delete/{id}', [
            'as'=>'categories.delete',
            'uses'=>'App\Http\Controllers\CategoryController@delete',
            'middleware'=>'can:category-delete',
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

    Route::prefix('users')->group(function () {
        Route::get('/', [
            'as'=>'users.index',
            'uses'=>'App\Http\Controllers\UserAdminController@index',
        ]);

        Route::get('/create', [
            'as'=>'users.create',
            'uses'=>'App\Http\Controllers\UserAdminController@create',
        ]);

        Route::post('/store', [
            'as'=>'users.store',
            'uses'=>'App\Http\Controllers\UserAdminController@store',
        ]);

        Route::get('/edit/{id}', [
            'as'=>'users.edit',
            'uses'=>'App\Http\Controllers\UserAdminController@edit',
        ]);

        Route::put('/update/{id}', [
            'as'=>'users.update',
            'uses'=>'App\Http\Controllers\UserAdminController@update',
        ]);

        Route::get('/delete/{id}', [
            'as'=>'users.delete',
            'uses'=>'App\Http\Controllers\UserAdminController@delete',
        ]);

    });

    Route::prefix('roles')->group(function () {
        Route::get('/', [
            'as'=>'roles.index',
            'uses'=>'App\Http\Controllers\AdminRolerController@index',
        ]);

        Route::get('/create', [
            'as'=>'roles.create',
            'uses'=>'App\Http\Controllers\AdminRolerController@create',
        ]);

        Route::post('/store', [
            'as'=>'roles.store',
            'uses'=>'App\Http\Controllers\AdminRolerController@store',
        ]);

        Route::get('/edit/{id}', [
            'as'=>'roles.edit',
            'uses'=>'App\Http\Controllers\AdminRolerController@edit',
        ]);

        Route::put('/update/{id}', [
            'as'=>'roles.update',
            'uses'=>'App\Http\Controllers\AdminRolerController@update',
        ]);

    });

    Route::prefix('permissions')->group(function () {
        Route::get('/create', [
            'as'=>'permissions.create',
            'uses'=>'App\Http\Controllers\AdminPermissionController@create',
        ]);

        Route::post('/store', [
            'as'=>'permissions.store',
            'uses'=>'App\Http\Controllers\AdminPermissionController@store',
        ]);

    });
});


