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

    Route::get('/notifications', [
        'as'=>'user.notifications',
        'uses'=>'App\Http\Controllers\User\NotificationController@index',
    ])->middleware('verified');

    Route::get('/invoices', [
        'as'=>'user.invoices',
        'uses'=>'App\Http\Controllers\User\InvoiceController@index',
    ])->middleware('verified');

    Route::get('/payment-product/{id}', [
        'as'=>'user.paymentProduct',
        'uses'=>'App\Http\Controllers\User\UserController@paymentProduct',
    ])->middleware('verified');

    Route::get('/payment-trading/{id}', [
        'as'=>'user.paymentTrading',
        'uses'=>'App\Http\Controllers\User\UserController@paymentTrading',
    ])->middleware('verified');

    Route::get('/learning-source/{id}', [
        'as'=>'user.learningSource',
        'uses'=>'App\Http\Controllers\User\UserController@learningSource',
    ])->middleware('verified');

    Route::get('/learning-source/{id}/{source_id}', [
        'as'=>'user.learningSourceHasSource',
        'uses'=>'App\Http\Controllers\User\UserController@learningSourceHasSource',
    ])->middleware('verified');

    Route::get('/update-process/{id}', [
        'as'=>'user.updateProcess',
        'uses'=>'App\Http\Controllers\User\UserController@updateProcess',
    ])->middleware('verified');

    Route::get('/profile', [
        'as'=>'user.profile',
        'uses'=>'App\Http\Controllers\User\UserController@profile',
    ])->middleware('verified');

    Route::get('/gifts', [
        'as'=>'user.gifts',
        'uses'=>'App\Http\Controllers\User\UserController@gifts',
    ])->middleware('verified');

    Route::get('/open-gift/{level_id}', [
        'as'=>'user.openGift',
        'uses'=>'App\Http\Controllers\User\UserController@openGift',
    ])->middleware('verified');

    Route::put('/profile', [
        'as'=>'user.updateProfile',
        'uses'=>'App\Http\Controllers\User\UserController@updateProfile',
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

//Route::get('/profile', function () {
//    // Only verified users may access this route...
//    return view('user.profile.index');
//})->middleware('verified');

Auth::routes(['verify' => true]);
