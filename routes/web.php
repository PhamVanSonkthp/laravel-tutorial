<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

Route::prefix('user')->group(function () {
    Route::get('/my-sources', [
        'as'=>'user.sources',
        'uses'=>'App\Http\Controllers\UserController@sources',
    ])->middleware('verified');

    Route::get('/payment/{id}', [
        'as'=>'user.payment',
        'uses'=>'App\Http\Controllers\UserController@payment',
    ])->middleware('verified');
});

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


Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/profile', function () {
    // Only verified users may access this route...
    return view('user.profile.index');
})->middleware('verified');

Auth::routes();
