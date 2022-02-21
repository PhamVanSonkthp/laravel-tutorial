<?php

use Illuminate\Support\Facades\Route;

Route::prefix('administrator')->group(function () {

    Route::prefix('dashboard')->group(function () {
        Route::get('/', [
            'as'=>'administrator.dashboard.index',
            'uses'=>'App\Http\Controllers\AdminDashboardController@index',
        ]);

    });

    Route::prefix('categories')->group(function () {
        Route::get('/', [
            'as'=>'categories.index',
            'uses'=>'App\Http\Controllers\CategoryController@index',
//            'middleware'=>'can:category-list',
        ]);

        Route::get('/create', [
            'as'=>'categories.create',
            'uses'=>'App\Http\Controllers\CategoryController@create',
//            'middleware'=>'can:category-add',
        ]);

        Route::post('/store', [
            'as'=>'categories.store',
            'uses'=>'App\Http\Controllers\CategoryController@store',
//            'middleware'=>'can:category-add',
        ]);

        Route::get('/edit/{id}', [
            'as'=>'categories.edit',
            'uses'=>'App\Http\Controllers\CategoryController@edit',
//            'middleware'=>'can:category-edit',
        ]);

        Route::put('/update/{id}', [
            'as'=>'categories.update',
            'uses'=>'App\Http\Controllers\CategoryController@update',
//            'middleware'=>'can:category-edit',
        ]);

        Route::get('/delete/{id}', [
            'as'=>'categories.delete',
            'uses'=>'App\Http\Controllers\CategoryController@delete',
//            'middleware'=>'can:category-delete',
        ]);
    });

    Route::prefix('products')->group(function () {
        Route::get('/', [
            'as'=>'administrator.products.index',
            'uses'=>'App\Http\Controllers\AdminProductController@index',
//            'middleware'=>'can:product-list',
        ]);

        Route::get('/create', [
            'as'=>'administrator.products.create',
            'uses'=>'App\Http\Controllers\AdminProductController@create',
        ]);

        Route::get('/edit/{id}', [
            'as'=>'administrator.products.edit',
            'uses'=>'App\Http\Controllers\AdminProductController@edit',
//            'middleware'=>'can:product-edit',
        ]);

        Route::post('/store', [
            'as'=>'administrator.products.store',
            'uses'=>'App\Http\Controllers\AdminProductController@store',
        ]);

        Route::put('/update/{id}', [
            'as'=>'administrator.products.update',
            'uses'=>'App\Http\Controllers\AdminProductController@update',
        ]);

        Route::get('/delete/{id}', [
            'as'=>'administrator.products.delete',
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

        Route::put('/update/{id}', [
            'as'=>'slider.update',
            'uses'=>'App\Http\Controllers\SliderAdminController@update',
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
            'as' => 'roles.index',
            'uses' => 'App\Http\Controllers\AdminRoleController@index',
//            'middleware'=>'can:product-list',
        ]);

        Route::get('/create', [
            'as' => 'roles.create',
            'uses' => 'App\Http\Controllers\AdminRoleController@create',
        ]);

        Route::get('/edit/{id}', [
            'as' => 'roles.edit',
            'uses' => 'App\Http\Controllers\AdminRoleController@edit',
//            'middleware'=>'can:product-edit',
        ]);

        Route::post('/store', [
            'as' => 'roles.store',
            'uses' => 'App\Http\Controllers\AdminRoleController@store',
        ]);

        Route::put('/update/{id}', [
            'as' => 'roles.update',
            'uses' => 'App\Http\Controllers\AdminRoleController@update',
        ]);

        Route::get('/delete/{id}', [
            'as' => 'roles.delete',
            'uses' => 'App\Http\Controllers\AdminRoleController@delete',
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

    Route::prefix('invoices')->group(function () {
        Route::get('/', [
            'as' => 'invoices.index',
            'uses' => 'App\Http\Controllers\AdminInvoiceController@index',
//            'middleware'=>'can:product-list',
        ]);

    });

    Route::prefix('levels')->group(function () {
        Route::get('/', [
            'as' => 'administrator.levels.index',
            'uses' => 'App\Http\Controllers\AdminLevelController@index',
//            'middleware'=>'can:product-list',
        ]);

        Route::get('/create', [
            'as' => 'administrator.levels.create',
            'uses' => 'App\Http\Controllers\AdminLevelController@create',
//            'middleware'=>'can:product-list',
        ]);

        Route::post('/store', [
            'as' => 'administrator.levels.store',
            'uses' => 'App\Http\Controllers\AdminLevelController@store',
//            'middleware'=>'can:product-list',
        ]);

        Route::get('/edit/{id}', [
            'as' => 'administrator.levels.edit',
            'uses' => 'App\Http\Controllers\AdminLevelController@edit',
//            'middleware'=>'can:product-list',
        ]);

        Route::put('/update/{id}', [
            'as' => 'administrator.levels.update',
            'uses' => 'App\Http\Controllers\AdminLevelController@update',
//            'middleware'=>'can:product-list',
        ]);

    });

    Route::prefix('gifts')->group(function () {
        Route::get('/', [
            'as' => 'administrator.gifts.index',
            'uses' => 'App\Http\Controllers\AdminGiftController@index',
//            'middleware'=>'can:product-list',
        ]);

        Route::get('/create', [
            'as' => 'administrator.gifts.create',
            'uses' => 'App\Http\Controllers\AdminGiftController@create',
//            'middleware'=>'can:product-list',
        ]);

        Route::post('/store', [
            'as' => 'administrator.gifts.store',
            'uses' => 'App\Http\Controllers\AdminGiftController@store',
//            'middleware'=>'can:product-list',
        ]);

        Route::get('/edit/{id}', [
            'as' => 'administrator.gifts.edit',
            'uses' => 'App\Http\Controllers\AdminGiftController@edit',
//            'middleware'=>'can:product-list',
        ]);

        Route::put('/update/{id}', [
            'as' => 'administrator.gifts.update',
            'uses' => 'App\Http\Controllers\AdminGiftController@update',
//            'middleware'=>'can:product-list',
        ]);

        Route::get('/delete/{id}', [
            'as' => 'administrator.gifts.delete',
            'uses' => 'App\Http\Controllers\AdminGiftController@delete',
//            'middleware'=>'can:product-list',
        ]);

    });

    Route::prefix('menus')->group(function () {
        Route::get('/', [
            'as'=>'administrator.menus.index',
            'uses'=>'App\Http\Controllers\MenuController@index',
        ]);

        Route::get('/create', [
            'as'=>'administrator.menus.create',
            'uses'=>'App\Http\Controllers\MenuController@create',
        ]);

        Route::post('/store', [
            'as'=>'administrator.menus.store',
            'uses'=>'App\Http\Controllers\MenuController@store',
        ]);

        Route::get('/edit/{id}', [
            'as'=>'administrator.menus.edit',
            'uses'=>'App\Http\Controllers\MenuController@edit',
        ]);

        Route::put('/update/{id}', [
            'as'=>'administrator.menus.update',
            'uses'=>'App\Http\Controllers\MenuController@update',
        ]);

        Route::get('/delete/{id}', [
            'as'=>'administrator.menus.delete',
            'uses'=>'App\Http\Controllers\MenuController@delete',
        ]);

    });

    Route::prefix('tradings')->group(function () {
        Route::get('/', [
            'as'=>'administrator.tradings.index',
            'uses'=>'App\Http\Controllers\AdminTradingController@index',
        ]);

        Route::get('/create', [
            'as'=>'administrator.tradings.create',
            'uses'=>'App\Http\Controllers\AdminTradingController@create',
        ]);

        Route::post('/store', [
            'as'=>'administrator.tradings.store',
            'uses'=>'App\Http\Controllers\AdminTradingController@store',
        ]);

        Route::get('/edit/{id}', [
            'as'=>'administrator.tradings.edit',
            'uses'=>'App\Http\Controllers\AdminTradingController@edit',
        ]);

        Route::put('/update/{id}', [
            'as'=>'administrator.tradings.update',
            'uses'=>'App\Http\Controllers\AdminTradingController@update',
        ]);

        Route::get('/delete/{id}', [
            'as'=>'administrator.tradings.delete',
            'uses'=>'App\Http\Controllers\AdminTradingController@delete',
        ]);

    });

    Route::prefix('topics')->group(function () {
        Route::get('/', [
            'as'=>'administrator.topics.index',
            'uses'=>'App\Http\Controllers\AdminTopicController@index',
        ]);

        Route::get('/create', [
            'as'=>'administrator.topics.create',
            'uses'=>'App\Http\Controllers\AdminTopicController@create',
        ]);

        Route::post('/store', [
            'as'=>'administrator.topics.store',
            'uses'=>'App\Http\Controllers\AdminTopicController@store',
        ]);

        Route::get('/edit/{id}', [
            'as'=>'administrator.topics.edit',
            'uses'=>'App\Http\Controllers\AdminTopicController@edit',
        ]);

        Route::put('/update/{id}', [
            'as'=>'administrator.topics.update',
            'uses'=>'App\Http\Controllers\AdminTopicController@update',
        ]);

        Route::get('/delete/{id}', [
            'as'=>'administrator.topics.delete',
            'uses'=>'App\Http\Controllers\AdminTopicController@delete',
        ]);

    });

    Route::prefix('sources')->group(function () {
        Route::get('/', [
            'as'=>'administrator.sources.index',
            'uses'=>'App\Http\Controllers\AdminSourceController@index',
        ]);

        Route::get('/create', [
            'as'=>'administrator.sources.create',
            'uses'=>'App\Http\Controllers\AdminSourceController@create',
        ]);

        Route::post('/store', [
            'as'=>'administrator.sources.store',
            'uses'=>'App\Http\Controllers\AdminSourceController@store',
        ]);

        Route::get('/edit/{id}', [
            'as'=>'administrator.sources.edit',
            'uses'=>'App\Http\Controllers\AdminSourceController@edit',
        ]);

        Route::put('/update/{id}', [
            'as'=>'administrator.sources.update',
            'uses'=>'App\Http\Controllers\AdminSourceController@update',
        ]);

        Route::get('/delete/{id}', [
            'as'=>'administrator.sources.delete',
            'uses'=>'App\Http\Controllers\AdminSourceController@delete',
        ]);

    });

});

