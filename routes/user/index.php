<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

Route::prefix('user')->group(function () {
    Route::get('/my-sources', [
        'as'=>'user.sources',
        'uses'=>'App\Http\Controllers\User\UserController@sources',
    ])->middleware('verified');

    Route::get('/my-tradings', [
        'as'=>'user.tradings',
        'uses'=>'App\Http\Controllers\User\TradingController@index',
    ])->middleware('verified');

    Route::get('/payment-product/{id}', [
        'as'=>'user.paymentProduct',
        'uses'=>'App\Http\Controllers\User\UserController@paymentProduct',
    ])->middleware('verified');

    Route::get('/payment-trading/{id}', [
        'as'=>'user.paymentTrading',
        'uses'=>'App\Http\Controllers\User\UserController@paymentTrading',
    ])->middleware('verified');

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

Auth::routes(['verify' => true]);
