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

Route::get('/admin', 'App\Http\Controllers\Admin\AdminController@loginAdmin');
Route::post('/admin', 'App\Http\Controllers\Admin\AdminController@postLoginAdmin');

Route::get('/admin/logout', [
    'as' => 'administrator.logout',
    'uses'=>'\App\Http\Controllers\Admin\AdminController@logout'
]);

Route::prefix('/')->group(function () {
    Route::get('/', [
        'as'=>'welcome.index',
        'uses'=>'App\Http\Controllers\WelcomeController@index',
    ]);

    Route::get('/product/{slug}', [
        'as'=>'welcome.product',
        'uses'=>'App\Http\Controllers\WelcomeController@product',
    ]);

    Route::get('/trading/{slug}', [
        'as'=>'welcome.trading',
        'uses'=>'App\Http\Controllers\WelcomeController@trading',
    ]);

    Route::get('/post/{slug}', [
        'as'=>'welcome.post',
        'uses'=>'App\Http\Controllers\WelcomeController@post',
    ]);

    Route::get('/post-trading/{slug}', [
        'as'=>'welcome.postTrading',
        'uses'=>'App\Http\Controllers\WelcomeController@postTrading',
    ]);

    Route::get('/products', [
        'as'=>'welcome.products',
        'uses'=>'App\Http\Controllers\WelcomeController@products',
    ]);

    Route::get('/tradings', [
        'as'=>'welcome.tradings',
        'uses'=>'App\Http\Controllers\WelcomeController@tradings',
    ]);

    Route::get('/posts', [
        'as'=>'welcome.posts',
        'uses'=>'App\Http\Controllers\WelcomeController@posts',
    ]);

    Route::get('/post-tradings', [
        'as'=>'welcome.postTradings',
        'uses'=>'App\Http\Controllers\WelcomeController@postTradings',
    ]);

    Route::get('/invoice-product/{id}', [
        'as'=>'welcome.invoiceProduct',
        'uses'=>'App\Http\Controllers\WelcomeController@invoiceProduct',
    ]);

    Route::get('/search', [
        'as'=>'welcome.search',
        'uses'=>'App\Http\Controllers\WelcomeController@search',
    ]);

});

//Route::get('/send-notification', [\App\Http\Controllers\NotificationController::class, 'sendNotification']);
