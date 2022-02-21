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

Route::prefix('/')->group(function () {
    Route::get('/', [
        'as'=>'welcome.index',
        'uses'=>'App\Http\Controllers\WelcomeController@index',
    ]);

    Route::get('/source/{id}', [
        'as'=>'welcome.source',
        'uses'=>'App\Http\Controllers\WelcomeController@source',
    ]);

    Route::get('/invoice/{id}', [
        'as'=>'welcome.invoice',
        'uses'=>'App\Http\Controllers\WelcomeController@invoice',
    ]);
});



