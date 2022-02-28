<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Payment\StripeController;

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

    Route::get('/invoice-product/{id}', [
        'as'=>'welcome.invoiceProduct',
        'uses'=>'App\Http\Controllers\WelcomeController@invoiceProduct',
    ]);
});

Route::post('/stripe-product/{id}', [StripeController::class,'stripePaymentProduct'])->name("stripe_product.post");
Route::post('/stripe-trading/{id}', [StripeController::class,'stripePaymentTrading'])->name("stripe_trading.post");

Route::get('/send-notification', [\App\Http\Controllers\NotificationController::class, 'sendNotification']);
