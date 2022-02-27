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
            'middleware'=>'can:category-list',
        ]);

        Route::get('/create', [
            'as'=>'categories.create',
            'uses'=>'App\Http\Controllers\Admin\AdminCategoryController@create',
            'middleware'=>'can:category-add',
        ]);

        Route::post('/store', [
            'as'=>'categories.store',
            'uses'=>'App\Http\Controllers\Admin\AdminCategoryController@store',
            'middleware'=>'can:category-add',
        ]);

        Route::get('/edit/{id}', [
            'as'=>'categories.edit',
            'uses'=>'App\Http\Controllers\Admin\AdminCategoryController@edit',
            'middleware'=>'can:category-edit',
        ]);

        Route::put('/update/{id}', [
            'as'=>'categories.update',
            'uses'=>'App\Http\Controllers\Admin\AdminCategoryController@update',
            'middleware'=>'can:category-edit',
        ]);

        Route::get('/delete/{id}', [
            'as'=>'categories.delete',
            'uses'=>'App\Http\Controllers\Admin\AdminCategoryController@delete',
            'middleware'=>'can:category-delete',
        ]);
    });

    Route::prefix('products')->group(function () {
        Route::get('/', [
            'as'=>'administrator.products.index',
            'uses'=>'App\Http\Controllers\Admin\AdminProductController@index',
            'middleware'=>'can:product-list',
        ]);

        Route::get('/create', [
            'as'=>'administrator.products.create',
            'uses'=>'App\Http\Controllers\Admin\AdminProductController@create',
            'middleware'=>'can:product-add',
        ]);

        Route::get('/edit/{id}', [
            'as'=>'administrator.products.edit',
            'uses'=>'App\Http\Controllers\Admin\AdminProductController@edit',
            'middleware'=>'can:product-edit',
        ]);

        Route::post('/store', [
            'as'=>'administrator.products.store',
            'uses'=>'App\Http\Controllers\Admin\AdminProductController@store',
            'middleware'=>'can:product-add',
        ]);

        Route::put('/update/{id}', [
            'as'=>'administrator.products.update',
            'uses'=>'App\Http\Controllers\Admin\AdminProductController@update',
            'middleware'=>'can:product-edit',
        ]);

        Route::get('/delete/{id}', [
            'as'=>'administrator.products.delete',
            'uses'=>'App\Http\Controllers\Admin\AdminProductController@delete',
            'middleware'=>'can:product-delete',
        ]);

    });

    Route::prefix('slider')->group(function () {
        Route::get('/', [
            'as'=>'slider.index',
            'uses'=>'App\Http\Controllers\Admin\AdminSliderController@index',
            'middleware'=>'can:slider-list',
        ]);

        Route::get('/create', [
            'as'=>'slider.create',
            'uses'=>'App\Http\Controllers\Admin\AdminSliderController@create',
            'middleware'=>'can:slider-add',
        ]);

        Route::post('/store', [
            'as'=>'slider.store',
            'uses'=>'App\Http\Controllers\Admin\AdminSliderController@store',
            'middleware'=>'can:slider-add',
        ]);

        Route::get('/edit/{id}', [
            'as'=>'slider.edit',
            'uses'=>'App\Http\Controllers\Admin\AdminSliderController@edit',
            'middleware'=>'can:slider-edit',
        ]);

        Route::put('/update/{id}', [
            'as'=>'slider.update',
            'uses'=>'App\Http\Controllers\Admin\AdminSliderController@update',
            'middleware'=>'can:slider-edit',
        ]);

        Route::get('/delete/{id}', [
            'as'=>'slider.delete',
            'uses'=>'App\Http\Controllers\Admin\AdminSliderController@delete',
            'middleware'=>'can:slider-delete',
        ]);

    });

    Route::prefix('users')->group(function () {
        Route::get('/', [
            'as'=>'users.index',
            'uses'=>'App\Http\Controllers\Admin\AdminUserController@index',
            'middleware'=>'can:user-list',
        ]);

        Route::get('/create', [
            'as'=>'users.create',
            'uses'=>'App\Http\Controllers\Admin\AdminUserController@create',
            'middleware'=>'can:user-add',
        ]);

        Route::post('/store', [
            'as'=>'users.store',
            'uses'=>'App\Http\Controllers\Admin\AdminUserController@store',
            'middleware'=>'can:user-add',
        ]);

        Route::get('/edit/{id}', [
            'as'=>'users.edit',
            'uses'=>'App\Http\Controllers\Admin\AdminUserController@edit',
            'middleware'=>'can:user-edit',
        ]);

        Route::put('/update/{id}', [
            'as'=>'users.update',
            'uses'=>'App\Http\Controllers\Admin\AdminUserController@update',
            'middleware'=>'can:user-edit',
        ]);

        Route::get('/delete/{id}', [
            'as'=>'users.delete',
            'uses'=>'App\Http\Controllers\Admin\AdminUserController@delete',
            'middleware'=>'can:user-delete',
        ]);

        Route::get('/sources/{id}', [
            'as'=>'administrator.users.sources.index',
            'uses'=>'App\Http\Controllers\Admin\AdminUserController@sourcesIndex',
            'middleware'=>'can:user-list',
        ]);

        Route::get('/gift/{id}', [
            'as'=>'administrator.users.gift.index',
            'uses'=>'App\Http\Controllers\Admin\AdminUserController@indexGift',
            'middleware'=>'can:user-list',
        ]);

        Route::get('/update/{id}', [
            'as'=>'administrator.users.gift.update',
            'uses'=>'App\Http\Controllers\Admin\AdminUserController@updateGift',
            'middleware'=>'can:user-list',
        ]);

    });

    Route::prefix('employees')->group(function () {
        Route::get('/', [
            'as'=>'administrator.employees.index',
            'uses'=>'App\Http\Controllers\Admin\AdminEmployeeController@index',
            'middleware'=>'can:employee-list',
        ]);

        Route::get('/create', [
            'as'=>'administrator.employees.create',
            'uses'=>'App\Http\Controllers\Admin\AdminEmployeeController@create',
            'middleware'=>'can:employee-add',
        ]);

        Route::post('/store', [
            'as'=>'administrator.employees.store',
            'uses'=>'App\Http\Controllers\Admin\AdminEmployeeController@store',
            'middleware'=>'can:employee-add',
        ]);

        Route::get('/edit/{id}', [
            'as'=>'administrator.employees.edit',
            'uses'=>'App\Http\Controllers\Admin\AdminEmployeeController@edit',
            'middleware'=>'can:employee-edit',
        ]);

        Route::put('/update/{id}', [
            'as'=>'administrator.employees.update',
            'uses'=>'App\Http\Controllers\Admin\AdminEmployeeController@update',
            'middleware'=>'can:employee-edit',
        ]);

        Route::get('/delete/{id}', [
            'as'=>'administrator.employees.delete',
            'uses'=>'App\Http\Controllers\Admin\AdminEmployeeController@delete',
            'middleware'=>'can:employee-delete',
        ]);

    });

    Route::prefix('roles')->group(function () {
        Route::get('/', [
            'as' => 'administrator.roles.index',
            'uses' => 'App\Http\Controllers\Admin\AdminRoleController@index',
            'middleware'=>'can:role-list',
        ]);

        Route::get('/create', [
            'as' => 'administrator.roles.create',
            'uses' => 'App\Http\Controllers\Admin\AdminRoleController@create',
            'middleware'=>'can:role-add',
        ]);

        Route::get('/edit/{id}', [
            'as' => 'administrator.roles.edit',
            'uses' => 'App\Http\Controllers\Admin\AdminRoleController@edit',
            'middleware'=>'can:role-edit',
        ]);

        Route::post('/store', [
            'as' => 'administrator.roles.store',
            'uses' => 'App\Http\Controllers\Admin\AdminRoleController@store',
            'middleware'=>'can:role-list',
        ]);

        Route::put('/update/{id}', [
            'as' => 'administrator.roles.update',
            'uses' => 'App\Http\Controllers\Admin\AdminRoleController@update',
            'middleware'=>'can:role-edit',
        ]);

        Route::get('/delete/{id}', [
            'as' => 'administrator.roles.delete',
            'uses' => 'App\Http\Controllers\Admin\AdminRoleController@delete',
            'middleware'=>'can:role-delete',
        ]);

    });

    Route::prefix('permissions')->group(function () {
        Route::get('/create', [
            'as'=>'administrator.permissions.create',
            'uses'=>'App\Http\Controllers\Admin\AdminPermissionController@create',
            'middleware'=>'can:permission-list',
        ]);

        Route::post('/store', [
            'as'=>'administrator.permissions.store',
            'uses'=>'App\Http\Controllers\Admin\AdminPermissionController@store',
            'middleware'=>'can:permission-add',
        ]);

    });

    Route::prefix('invoices')->group(function () {
        Route::get('/', [
            'as' => 'invoices.index',
            'uses' => 'App\Http\Controllers\Admin\AdminInvoiceController@index',
            'middleware'=>'can:invoice-list',
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
            'middleware'=>'can:level-list',
        ]);

        Route::get('/create', [
            'as' => 'administrator.gifts.create',
            'uses' => 'App\Http\Controllers\Admin\AdminGiftController@create',
            'middleware'=>'can:level-add',
        ]);

        Route::post('/store', [
            'as' => 'administrator.gifts.store',
            'uses' => 'App\Http\Controllers\Admin\AdminGiftController@store',
            'middleware'=>'can:level-add',
        ]);

        Route::get('/edit/{id}', [
            'as' => 'administrator.gifts.edit',
            'uses' => 'App\Http\Controllers\Admin\AdminGiftController@edit',
            'middleware'=>'can:level-edit',
        ]);

        Route::put('/update/{id}', [
            'as' => 'administrator.gifts.update',
            'uses' => 'App\Http\Controllers\Admin\AdminGiftController@update',
            'middleware'=>'can:level-edit',
        ]);

        Route::get('/delete/{id}', [
            'as' => 'administrator.gifts.delete',
            'uses' => 'App\Http\Controllers\Admin\AdminGiftController@delete',
            'middleware'=>'can:level-delete',
        ]);

    });

    Route::prefix('menus')->group(function () {
        Route::get('/', [
            'as'=>'administrator.menus.index',
            'uses'=>'App\Http\Controllers\Admin\AdminMenuController@index',
            'middleware'=>'can:menu-list',
        ]);

        Route::get('/create', [
            'as'=>'administrator.menus.create',
            'uses'=>'App\Http\Controllers\Admin\AdminMenuController@create',
            'middleware'=>'can:menu-add',
        ]);

        Route::post('/store', [
            'as'=>'administrator.menus.store',
            'uses'=>'App\Http\Controllers\Admin\AdminMenuController@store',
            'middleware'=>'can:menu-add',
        ]);

        Route::get('/edit/{id}', [
            'as'=>'administrator.menus.edit',
            'uses'=>'App\Http\Controllers\Admin\AdminMenuController@edit',
            'middleware'=>'can:menu-edit',
        ]);

        Route::put('/update/{id}', [
            'as'=>'administrator.menus.update',
            'uses'=>'App\Http\Controllers\Admin\AdminMenuController@update',
            'middleware'=>'can:menu-edit',
        ]);

        Route::get('/delete/{id}', [
            'as'=>'administrator.menus.delete',
            'uses'=>'App\Http\Controllers\Admin\AdminMenuController@delete',
            'middleware'=>'can:menu-delete',
        ]);

    });

    Route::prefix('post')->group(function () {
        Route::get('/', [
            'as'=>'administrator.post.index',
            'uses'=>'App\Http\Controllers\Admin\AdminPostController@index',
            'middleware'=>'can:post-list',
        ]);

        Route::get('/create', [
            'as'=>'administrator.post.create',
            'uses'=>'App\Http\Controllers\Admin\AdminPostController@create',
            'middleware'=>'can:post-add',
        ]);

        Route::post('/store', [
            'as'=>'administrator.post.store',
            'uses'=>'App\Http\Controllers\Admin\AdminPostController@store',
            'middleware'=>'can:post-add',
        ]);

        Route::get('/edit/{id}', [
            'as'=>'administrator.post.edit',
            'uses'=>'App\Http\Controllers\Admin\AdminPostController@edit',
            'middleware'=>'can:post-edit',
        ]);

        Route::put('/update/{id}', [
            'as'=>'administrator.post.update',
            'uses'=>'App\Http\Controllers\Admin\AdminPostController@update',
            'middleware'=>'can:post-edit',
        ]);

        Route::get('/delete/{id}', [
            'as'=>'administrator.post.delete',
            'uses'=>'App\Http\Controllers\Admin\AdminPostController@delete',
            'middleware'=>'can:post-delete',
        ]);

    });

    Route::prefix('tradings')->group(function () {
        Route::get('/', [
            'as'=>'administrator.tradings.index',
            'uses'=>'App\Http\Controllers\Admin\AdminTradingController@index',
            'middleware'=>'can:trading-list',
        ]);

        Route::get('/create', [
            'as'=>'administrator.tradings.create',
            'uses'=>'App\Http\Controllers\Admin\AdminTradingController@create',
            'middleware'=>'can:trading-add',
        ]);

        Route::post('/store', [
            'as'=>'administrator.tradings.store',
            'uses'=>'App\Http\Controllers\Admin\AdminTradingController@store',
            'middleware'=>'can:trading-add',
        ]);

        Route::get('/edit/{id}', [
            'as'=>'administrator.tradings.edit',
            'uses'=>'App\Http\Controllers\Admin\AdminTradingController@edit',
            'middleware'=>'can:trading-edit',
        ]);

        Route::put('/update/{id}', [
            'as'=>'administrator.tradings.update',
            'uses'=>'App\Http\Controllers\Admin\AdminTradingController@update',
            'middleware'=>'can:trading-edit',
        ]);

        Route::get('/delete/{id}', [
            'as'=>'administrator.tradings.delete',
            'uses'=>'App\Http\Controllers\Admin\AdminTradingController@delete',
            'middleware'=>'can:trading-delete',
        ]);

        Route::prefix('register')->group(function () {
            Route::get('/', [
                'as'=>'administrator.tradings.register.index',
                'uses'=>'App\Http\Controllers\Admin\AdminTradingController@indexRegister',
                'middleware'=>'can:trading-list',
            ]);

            Route::get('/create', [
                'as'=>'administrator.tradings.register.createRegister',
                'uses'=>'App\Http\Controllers\Admin\AdminTradingController@createRegister',
                'middleware'=>'can:trading-list',
            ]);

            Route::post('/store', [
                'as'=>'administrator.tradings.register.store',
                'uses'=>'App\Http\Controllers\Admin\AdminTradingController@storeRegister',
                'middleware'=>'can:trading-list',
            ]);

            Route::get('/edit/{id}', [
                'as'=>'administrator.tradings.register.edit',
                'uses'=>'App\Http\Controllers\Admin\AdminTradingController@editRegister',
                'middleware'=>'can:trading-list',
            ]);

            Route::put('/update/{id}', [
                'as'=>'administrator.tradings.register.update',
                'uses'=>'App\Http\Controllers\Admin\AdminTradingController@updateRegister',
                'middleware'=>'can:trading-list',
            ]);

            Route::get('/delete/{id}', [
                'as'=>'administrator.tradings.register.delete',
                'uses'=>'App\Http\Controllers\Admin\AdminTradingController@deleteRegister',
                'middleware'=>'can:trading-list',
            ]);

        });

    });

    Route::prefix('topics')->group(function () {
        Route::get('/', [
            'as'=>'administrator.topics.index',
            'uses'=>'App\Http\Controllers\Admin\AdminTopicController@index',
            'middleware'=>'can:topic-list',
        ]);

        Route::get('/create', [
            'as'=>'administrator.topics.create',
            'uses'=>'App\Http\Controllers\Admin\AdminTopicController@create',
            'middleware'=>'can:topic-add',
        ]);

        Route::post('/store', [
            'as'=>'administrator.topics.store',
            'uses'=>'App\Http\Controllers\Admin\AdminTopicController@store',
            'middleware'=>'can:topic-add',
        ]);

        Route::get('/edit/{id}', [
            'as'=>'administrator.topics.edit',
            'uses'=>'App\Http\Controllers\Admin\AdminTopicController@edit',
            'middleware'=>'can:topic-edit',
        ]);

        Route::put('/update/{id}', [
            'as'=>'administrator.topics.update',
            'uses'=>'App\Http\Controllers\Admin\AdminTopicController@update',
            'middleware'=>'can:topic-edit',
        ]);

        Route::get('/delete/{id}', [
            'as'=>'administrator.topics.delete',
            'uses'=>'App\Http\Controllers\Admin\AdminTopicController@delete',
            'middleware'=>'can:topic-delete',
        ]);

    });

    Route::prefix('sources')->group(function () {
        Route::get('/', [
            'as'=>'administrator.sources.index',
            'uses'=>'App\Http\Controllers\Admin\AdminSourceController@index',
            'middleware'=>'can:source-list',
        ]);

        Route::get('/create', [
            'as'=>'administrator.sources.create',
            'uses'=>'App\Http\Controllers\Admin\AdminSourceController@create',
            'middleware'=>'can:source-add',
        ]);

        Route::post('/store', [
            'as'=>'administrator.sources.store',
            'uses'=>'App\Http\Controllers\Admin\AdminSourceController@store',
            'middleware'=>'can:source-add',
        ]);

        Route::get('/edit/{id}', [
            'as'=>'administrator.sources.edit',
            'uses'=>'App\Http\Controllers\Admin\AdminSourceController@edit',
            'middleware'=>'can:source-edit',
        ]);

        Route::put('/update/{id}', [
            'as'=>'administrator.sources.update',
            'uses'=>'App\Http\Controllers\Admin\AdminSourceController@update',
            'middleware'=>'can:source-edit',
        ]);

        Route::get('/delete/{id}', [
            'as'=>'administrator.sources.delete',
            'uses'=>'App\Http\Controllers\Admin\AdminSourceController@delete',
            'middleware'=>'can:source-delete',
        ]);

    });

    Route::prefix('payment-stripe')->group(function () {
        Route::get('/', [
            'as'=>'administrator.payment_stripe.index',
            'uses'=>'App\Http\Controllers\Admin\AdminPaymentStripeController@index',
            'middleware'=>'can:payment-stripe-list',
        ]);

        Route::post('/store', [
            'as'=>'administrator.payment_stripe.store',
            'uses'=>'App\Http\Controllers\Admin\AdminPaymentStripeController@store',
            'middleware'=>'can:payment-stripe-add',
        ]);

    });

    Route::prefix('notification')->group(function () {
        Route::get('/', [
            'as'=>'administrator.notification.index',
            'uses'=>'App\Http\Controllers\Admin\AdminNotificationController@index',
            'middleware'=>'can:notification-list',
        ]);

        Route::get('/delete/{id}', [
            'as'=>'administrator.notification.delete',
            'uses'=>'App\Http\Controllers\Admin\AdminNotificationController@delete',
            'middleware'=>'can:notification-delete',
        ]);

    });

});

