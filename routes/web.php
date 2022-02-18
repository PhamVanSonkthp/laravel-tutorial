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





    Route::prefix('roles')->group(function () {
        Route::get('/', [
            'as'=>'roles.index',
            'uses'=>'App\Http\Controllers\AdminRoleController@index',
        ]);

        Route::get('/create', [
            'as'=>'roles.create',
            'uses'=>'App\Http\Controllers\AdminRoleController@create',
        ]);

        Route::post('/store', [
            'as'=>'roles.store',
            'uses'=>'App\Http\Controllers\AdminRoleController@store',
        ]);

        Route::get('/edit/{id}', [
            'as'=>'roles.edit',
            'uses'=>'App\Http\Controllers\AdminRoleController@edit',
        ]);

        Route::put('/update/{id}', [
            'as'=>'roles.update',
            'uses'=>'App\Http\Controllers\AdminRoleController@update',
        ]);

    });


});


