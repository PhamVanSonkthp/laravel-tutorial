<?php

use Illuminate\Support\Facades\Route;

Route::prefix('administrator')->group(function () {

    Route::prefix('dashboard')->group(function () {
        Route::get('/', [
            'as'=>'administrator.dashboard.index',
            'uses'=>'App\Http\Controllers\Admin\AdminDashboardController@index',
        ]);

    });

    Route::prefix('categories')->group(function () {
        Route::get('/', [
            'as'=>'categories.index',
            'uses'=>'App\Http\Controllers\Admin\AdminCategoryController@index',
//            'middleware'=>'can:category-list',
        ]);

        Route::get('/create', [
            'as'=>'categories.create',
            'uses'=>'App\Http\Controllers\Admin\AdminCategoryController@create',
//            'middleware'=>'can:category-add',
        ]);

        Route::post('/store', [
            'as'=>'categories.store',
            'uses'=>'App\Http\Controllers\Admin\AdminCategoryController@store',
//            'middleware'=>'can:category-add',
        ]);

        Route::get('/edit/{id}', [
            'as'=>'categories.edit',
            'uses'=>'App\Http\Controllers\Admin\AdminCategoryController@edit',
//            'middleware'=>'can:category-edit',
        ]);

        Route::put('/update/{id}', [
            'as'=>'categories.update',
            'uses'=>'App\Http\Controllers\Admin\AdminCategoryController@update',
//            'middleware'=>'can:category-edit',
        ]);

        Route::get('/delete/{id}', [
            'as'=>'categories.delete',
            'uses'=>'App\Http\Controllers\Admin\AdminCategoryController@delete',
//            'middleware'=>'can:category-delete',
        ]);
    });

    Route::prefix('products')->group(function () {
        Route::get('/', [
            'as'=>'administrator.products.index',
            'uses'=>'App\Http\Controllers\Admin\AdminProductController@index',
//            'middleware'=>'can:product-list',
        ]);

        Route::get('/create', [
            'as'=>'administrator.products.create',
            'uses'=>'App\Http\Controllers\Admin\AdminProductController@create',
        ]);

        Route::get('/edit/{id}', [
            'as'=>'administrator.products.edit',
            'uses'=>'App\Http\Controllers\Admin\AdminProductController@edit',
//            'middleware'=>'can:product-edit',
        ]);

        Route::post('/store', [
            'as'=>'administrator.products.store',
            'uses'=>'App\Http\Controllers\Admin\AdminProductController@store',
        ]);

        Route::put('/update/{id}', [
            'as'=>'administrator.products.update',
            'uses'=>'App\Http\Controllers\Admin\AdminProductController@update',
        ]);

        Route::get('/delete/{id}', [
            'as'=>'administrator.products.delete',
            'uses'=>'App\Http\Controllers\Admin\AdminProductController@delete',
        ]);

    });

    Route::prefix('slider')->group(function () {
        Route::get('/', [
            'as'=>'slider.index',
            'uses'=>'App\Http\Controllers\Admin\AdminSliderController@index',
        ]);

        Route::get('/create', [
            'as'=>'slider.create',
            'uses'=>'App\Http\Controllers\Admin\AdminSliderController@create',
        ]);

        Route::post('/store', [
            'as'=>'slider.store',
            'uses'=>'App\Http\Controllers\Admin\AdminSliderController@store',
        ]);

        Route::get('/edit/{id}', [
            'as'=>'slider.edit',
            'uses'=>'App\Http\Controllers\Admin\AdminSliderController@edit',
        ]);

        Route::put('/update/{id}', [
            'as'=>'slider.update',
            'uses'=>'App\Http\Controllers\Admin\AdminSliderController@update',
        ]);

        Route::get('/delete/{id}', [
            'as'=>'slider.delete',
            'uses'=>'App\Http\Controllers\Admin\AdminSliderController@delete',
        ]);

    });

    Route::prefix('users')->group(function () {
        Route::get('/', [
            'as'=>'users.index',
            'uses'=>'App\Http\Controllers\Admin\AdminUserController@index',
        ]);

        Route::get('/create', [
            'as'=>'users.create',
            'uses'=>'App\Http\Controllers\Admin\AdminUserController@create',
        ]);

        Route::post('/store', [
            'as'=>'users.store',
            'uses'=>'App\Http\Controllers\Admin\AdminUserController@store',
        ]);

        Route::get('/edit/{id}', [
            'as'=>'users.edit',
            'uses'=>'App\Http\Controllers\Admin\AdminUserController@edit',
        ]);

        Route::put('/update/{id}', [
            'as'=>'users.update',
            'uses'=>'App\Http\Controllers\Admin\AdminUserController@update',
        ]);

        Route::get('/delete/{id}', [
            'as'=>'users.delete',
            'uses'=>'App\Http\Controllers\Admin\AdminUserController@delete',
        ]);

        Route::get('/sources/{id}', [
            'as'=>'administrator.users.sources.index',
            'uses'=>'App\Http\Controllers\Admin\AdminUserController@sourcesIndex',
        ]);

    });

    Route::prefix('employees')->group(function () {
        Route::get('/', [
            'as'=>'administrator.employees.index',
            'uses'=>'App\Http\Controllers\Admin\AdminEmployeeController@index',
        ]);

        Route::get('/create', [
            'as'=>'administrator.employees.create',
            'uses'=>'App\Http\Controllers\Admin\AdminEmployeeController@create',
        ]);

        Route::post('/store', [
            'as'=>'administrator.employees.store',
            'uses'=>'App\Http\Controllers\Admin\AdminEmployeeController@store',
        ]);

        Route::get('/edit/{id}', [
            'as'=>'administrator.employees.edit',
            'uses'=>'App\Http\Controllers\Admin\AdminEmployeeController@edit',
        ]);

        Route::put('/update/{id}', [
            'as'=>'administrator.employees.update',
            'uses'=>'App\Http\Controllers\Admin\AdminEmployeeController@update',
        ]);

        Route::get('/delete/{id}', [
            'as'=>'administrator.employees.delete',
            'uses'=>'App\Http\Controllers\Admin\AdminEmployeeController@delete',
        ]);

    });

    Route::prefix('roles')->group(function () {
        Route::get('/', [
            'as' => 'administrator.roles.index',
            'uses' => 'App\Http\Controllers\Admin\AdminRoleController@index',
//            'middleware'=>'can:product-list',
        ]);

        Route::get('/create', [
            'as' => 'administrator.roles.create',
            'uses' => 'App\Http\Controllers\Admin\AdminRoleController@create',
        ]);

        Route::get('/edit/{id}', [
            'as' => 'administrator.roles.edit',
            'uses' => 'App\Http\Controllers\Admin\AdminRoleController@edit',
//            'middleware'=>'can:product-edit',
        ]);

        Route::post('/store', [
            'as' => 'administrator.roles.store',
            'uses' => 'App\Http\Controllers\Admin\AdminRoleController@store',
        ]);

        Route::put('/update/{id}', [
            'as' => 'administrator.roles.update',
            'uses' => 'App\Http\Controllers\Admin\AdminRoleController@update',
        ]);

        Route::get('/delete/{id}', [
            'as' => 'administrator.roles.delete',
            'uses' => 'App\Http\Controllers\Admin\AdminRoleController@delete',
        ]);

    });

    Route::prefix('permissions')->group(function () {
        Route::get('/create', [
            'as'=>'permissions.create',
            'uses'=>'App\Http\Controllers\Admin\AdminPermissionController@create',
        ]);

        Route::post('/store', [
            'as'=>'administrator.permissions.store',
            'uses'=>'App\Http\Controllers\Admin\AdminPermissionController@store',
        ]);

    });

    Route::prefix('invoices')->group(function () {
        Route::get('/', [
            'as' => 'invoices.index',
            'uses' => 'App\Http\Controllers\Admin\AdminInvoiceController@index',
//            'middleware'=>'can:product-list',
        ]);

    });

    Route::prefix('levels')->group(function () {
        Route::get('/', [
            'as' => 'administrator.levels.index',
            'uses' => 'App\Http\Controllers\Admin\AdminLevelController@index',
//            'middleware'=>'can:product-list',
        ]);

        Route::get('/create', [
            'as' => 'administrator.levels.create',
            'uses' => 'App\Http\Controllers\Admin\AdminLevelController@create',
//            'middleware'=>'can:product-list',
        ]);

        Route::post('/store', [
            'as' => 'administrator.levels.store',
            'uses' => 'App\Http\Controllers\Admin\AdminLevelController@store',
//            'middleware'=>'can:product-list',
        ]);

        Route::get('/edit/{id}', [
            'as' => 'administrator.levels.edit',
            'uses' => 'App\Http\Controllers\Admin\AdminLevelController@edit',
//            'middleware'=>'can:product-list',
        ]);

        Route::put('/update/{id}', [
            'as' => 'administrator.levels.update',
            'uses' => 'App\Http\Controllers\Admin\AdminLevelController@update',
//            'middleware'=>'can:product-list',
        ]);

        Route::get('/delete/{id}', [
            'as' => 'administrator.levels.delete',
            'uses' => 'App\Http\Controllers\Admin\AdminLevelController@delete',
//            'middleware'=>'can:product-list',
        ]);

    });

    Route::prefix('gifts')->group(function () {
        Route::get('/', [
            'as' => 'administrator.gifts.index',
            'uses' => 'App\Http\Controllers\Admin\AdminGiftController@index',
//            'middleware'=>'can:product-list',
        ]);

        Route::get('/create', [
            'as' => 'administrator.gifts.create',
            'uses' => 'App\Http\Controllers\Admin\AdminGiftController@create',
//            'middleware'=>'can:product-list',
        ]);

        Route::post('/store', [
            'as' => 'administrator.gifts.store',
            'uses' => 'App\Http\Controllers\Admin\AdminGiftController@store',
//            'middleware'=>'can:product-list',
        ]);

        Route::get('/edit/{id}', [
            'as' => 'administrator.gifts.edit',
            'uses' => 'App\Http\Controllers\Admin\AdminGiftController@edit',
//            'middleware'=>'can:product-list',
        ]);

        Route::put('/update/{id}', [
            'as' => 'administrator.gifts.update',
            'uses' => 'App\Http\Controllers\Admin\AdminGiftController@update',
//            'middleware'=>'can:product-list',
        ]);

        Route::get('/delete/{id}', [
            'as' => 'administrator.gifts.delete',
            'uses' => 'App\Http\Controllers\Admin\AdminGiftController@delete',
//            'middleware'=>'can:product-list',
        ]);

    });

    Route::prefix('menus')->group(function () {
        Route::get('/', [
            'as'=>'administrator.menus.index',
            'uses'=>'App\Http\Controllers\Admin\AdminMenuController@index',
        ]);

        Route::get('/create', [
            'as'=>'administrator.menus.create',
            'uses'=>'App\Http\Controllers\Admin\AdminMenuController@create',
        ]);

        Route::post('/store', [
            'as'=>'administrator.menus.store',
            'uses'=>'App\Http\Controllers\Admin\AdminMenuController@store',
        ]);

        Route::get('/edit/{id}', [
            'as'=>'administrator.menus.edit',
            'uses'=>'App\Http\Controllers\Admin\AdminMenuController@edit',
        ]);

        Route::put('/update/{id}', [
            'as'=>'administrator.menus.update',
            'uses'=>'App\Http\Controllers\Admin\AdminMenuController@update',
        ]);

        Route::get('/delete/{id}', [
            'as'=>'administrator.menus.delete',
            'uses'=>'App\Http\Controllers\Admin\AdminMenuController@delete',
        ]);

    });

    Route::prefix('tradings')->group(function () {
        Route::get('/', [
            'as'=>'administrator.tradings.index',
            'uses'=>'App\Http\Controllers\Admin\AdminTradingController@index',
        ]);

        Route::get('/create', [
            'as'=>'administrator.tradings.create',
            'uses'=>'App\Http\Controllers\Admin\AdminTradingController@create',
        ]);

        Route::post('/store', [
            'as'=>'administrator.tradings.store',
            'uses'=>'App\Http\Controllers\Admin\AdminTradingController@store',
        ]);

        Route::get('/edit/{id}', [
            'as'=>'administrator.tradings.edit',
            'uses'=>'App\Http\Controllers\Admin\AdminTradingController@edit',
        ]);

        Route::put('/update/{id}', [
            'as'=>'administrator.tradings.update',
            'uses'=>'App\Http\Controllers\Admin\AdminTradingController@update',
        ]);

        Route::get('/delete/{id}', [
            'as'=>'administrator.tradings.delete',
            'uses'=>'App\Http\Controllers\Admin\AdminTradingController@delete',
        ]);

        Route::prefix('register')->group(function () {
            Route::get('/', [
                'as'=>'administrator.tradings.register.index',
                'uses'=>'App\Http\Controllers\Admin\AdminTradingController@indexRegister',
            ]);

            Route::get('/create', [
                'as'=>'administrator.tradings.register.createRegister',
                'uses'=>'App\Http\Controllers\Admin\AdminTradingController@createRegister',
            ]);

            Route::post('/store', [
                'as'=>'administrator.tradings.register.store',
                'uses'=>'App\Http\Controllers\Admin\AdminTradingController@storeRegister',
            ]);

            Route::get('/edit/{id}', [
                'as'=>'administrator.tradings.register.edit',
                'uses'=>'App\Http\Controllers\Admin\AdminTradingController@editRegister',
            ]);

            Route::put('/update/{id}', [
                'as'=>'administrator.tradings.register.update',
                'uses'=>'App\Http\Controllers\Admin\AdminTradingController@updateRegister',
            ]);

            Route::get('/delete/{id}', [
                'as'=>'administrator.tradings.register.delete',
                'uses'=>'App\Http\Controllers\Admin\AdminTradingController@deleteRegister',
            ]);

        });

    });

    Route::prefix('topics')->group(function () {
        Route::get('/', [
            'as'=>'administrator.topics.index',
            'uses'=>'App\Http\Controllers\Admin\AdminTopicController@index',
        ]);

        Route::get('/create', [
            'as'=>'administrator.topics.create',
            'uses'=>'App\Http\Controllers\Admin\AdminTopicController@create',
        ]);

        Route::post('/store', [
            'as'=>'administrator.topics.store',
            'uses'=>'App\Http\Controllers\Admin\AdminTopicController@store',
        ]);

        Route::get('/edit/{id}', [
            'as'=>'administrator.topics.edit',
            'uses'=>'App\Http\Controllers\Admin\AdminTopicController@edit',
        ]);

        Route::put('/update/{id}', [
            'as'=>'administrator.topics.update',
            'uses'=>'App\Http\Controllers\Admin\AdminTopicController@update',
        ]);

        Route::get('/delete/{id}', [
            'as'=>'administrator.topics.delete',
            'uses'=>'App\Http\Controllers\Admin\AdminTopicController@delete',
        ]);

    });

    Route::prefix('sources')->group(function () {
        Route::get('/', [
            'as'=>'administrator.sources.index',
            'uses'=>'App\Http\Controllers\Admin\AdminSourceController@index',
        ]);

        Route::get('/create', [
            'as'=>'administrator.sources.create',
            'uses'=>'App\Http\Controllers\Admin\AdminSourceController@create',
        ]);

        Route::post('/store', [
            'as'=>'administrator.sources.store',
            'uses'=>'App\Http\Controllers\Admin\AdminSourceController@store',
        ]);

        Route::get('/edit/{id}', [
            'as'=>'administrator.sources.edit',
            'uses'=>'App\Http\Controllers\Admin\AdminSourceController@edit',
        ]);

        Route::put('/update/{id}', [
            'as'=>'administrator.sources.update',
            'uses'=>'App\Http\Controllers\Admin\AdminSourceController@update',
        ]);

        Route::get('/delete/{id}', [
            'as'=>'administrator.sources.delete',
            'uses'=>'App\Http\Controllers\Admin\AdminSourceController@delete',
        ]);

    });

});

