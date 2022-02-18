<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [
    'as'=>'user.index',
    'uses'=>'App\Http\Controllers\UserController@index',
]);

Route::get('/register', [
    'as'=>'user.register',
    'uses'=>'App\Http\Controllers\UserController@register',
]);
