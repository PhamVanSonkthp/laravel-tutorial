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

    Route::get('/product/{id}', [
        'as'=>'welcome.product',
        'uses'=>'App\Http\Controllers\WelcomeController@product',
    ]);

    Route::get('/invoice-product/{id}', [
        'as'=>'welcome.invoiceProduct',
        'uses'=>'App\Http\Controllers\WelcomeController@invoiceProduct',
    ]);
});

Route::post('/stripe/{id}', [StripeController::class,'stripePaymentProduct'])->name("stripe.post");
