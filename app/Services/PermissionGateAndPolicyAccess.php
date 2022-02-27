<?php

namespace App\Services;

use Illuminate\Support\Facades\Gate;

class PermissionGateAndPolicyAccess{

    public function setGateAndPolicyAccess(){
        $this->defineGateCategory();
        $this->defineGateProduct();
        $this->defineGateSlider();
        $this->defineGateUser();
        $this->defineGateEmployee();
        $this->defineGateRole();
        $this->defineGatePermission();
        $this->defineGateInvoice();
        $this->defineGateLevel();
        $this->defineGateMenu();
        $this->defineGateTrading();
        $this->defineGateTopic();
        $this->defineGateSource();
        $this->defineGatePaymentStripe();
        $this->defineGateNotification();
        $this->defineGatePost();
    }

    public function defineGateCategory(){
        Gate::define('category-list','App\Policies\CategoryPolicy@view');
        Gate::define('category-add','App\Policies\CategoryPolicy@create');
        Gate::define('category-edit','App\Policies\CategoryPolicy@update');
        Gate::define('category-delete','App\Policies\CategoryPolicy@delete');
    }

    public function defineGateProduct(){
        Gate::define('product-list','App\Policies\ProductPolicy@view');
        Gate::define('product-add','App\Policies\ProductPolicy@create');
        Gate::define('product-edit','App\Policies\ProductPolicy@update');
        Gate::define('product-delete','App\Policies\ProductPolicy@delete');
    }

    public function defineGateSlider(){
        Gate::define('slider-list','App\Policies\SliderPolicy@view');
        Gate::define('slider-add','App\Policies\SliderPolicy@create');
        Gate::define('slider-edit','App\Policies\SliderPolicy@update');
        Gate::define('slider-delete','App\Policies\SliderPolicy@delete');
    }

    public function defineGateUser(){
        Gate::define('user-list','App\Policies\UserPolicy@view');
        Gate::define('user-add','App\Policies\UserPolicy@create');
        Gate::define('user-edit','App\Policies\UserPolicy@update');
        Gate::define('user-delete','App\Policies\UserPolicy@delete');
    }

    public function defineGateEmployee(){
        Gate::define('employee-list','App\Policies\EmployeePolicy@view');
        Gate::define('employee-add','App\Policies\EmployeePolicy@create');
        Gate::define('employee-edit','App\Policies\EmployeePolicy@update');
        Gate::define('employee-delete','App\Policies\EmployeePolicy@delete');
    }

    public function defineGateRole(){
        Gate::define('role-list','App\Policies\RolePolicy@view');
        Gate::define('role-add','App\Policies\RolePolicy@create');
        Gate::define('role-edit','App\Policies\RolePolicy@update');
        Gate::define('role-delete','App\Policies\RolePolicy@delete');
    }

    public function defineGatePermission(){
        Gate::define('permission-list','App\Policies\PermissionPolicy@view');
        Gate::define('permission-add','App\Policies\PermissionPolicy@create');
        Gate::define('permission-edit','App\Policies\PermissionPolicy@update');
        Gate::define('permission-delete','App\Policies\PermissionPolicy@delete');
    }

    public function defineGateInvoice(){
        Gate::define('invoice-list','App\Policies\InvoicePolicy@view');
        Gate::define('invoice-add','App\Policies\InvoicePolicy@create');
        Gate::define('invoice-edit','App\Policies\InvoicePolicy@update');
        Gate::define('invoice-delete','App\Policies\InvoicePolicy@delete');
    }

    public function defineGateLevel(){
        Gate::define('level-list','App\Policies\LevelPolicy@view');
        Gate::define('level-add','App\Policies\LevelPolicy@create');
        Gate::define('level-edit','App\Policies\LevelPolicy@update');
        Gate::define('level-delete','App\Policies\LevelPolicy@delete');
    }

    public function defineGateMenu(){
        Gate::define('menu-list','App\Policies\MenuPolicy@view');
        Gate::define('menu-add','App\Policies\MenuPolicy@create');
        Gate::define('menu-edit','App\Policies\MenuPolicy@update');
        Gate::define('menu-delete','App\Policies\MenuPolicy@delete');
    }

    public function defineGateTrading(){
        Gate::define('trading-list','App\Policies\TradingPolicy@view');
        Gate::define('trading-add','App\Policies\TradingPolicy@create');
        Gate::define('trading-edit','App\Policies\TradingPolicy@update');
        Gate::define('trading-delete','App\Policies\TradingPolicy@delete');
    }

    public function defineGateTopic(){
        Gate::define('topic-list','App\Policies\TopicPolicy@view');
        Gate::define('topic-add','App\Policies\TopicPolicy@create');
        Gate::define('topic-edit','App\Policies\TopicPolicy@update');
        Gate::define('topic-delete','App\Policies\TopicPolicy@delete');
    }

    public function defineGateSource(){
        Gate::define('source-list','App\Policies\SourcePolicy@view');
        Gate::define('source-add','App\Policies\SourcePolicy@create');
        Gate::define('source-edit','App\Policies\SourcePolicy@update');
        Gate::define('source-delete','App\Policies\SourcePolicy@delete');
    }

    public function defineGatePaymentStripe(){
        Gate::define('payment-stripe-list','App\Policies\PaymentStripePolicy@view');
        Gate::define('payment-stripe-add','App\Policies\PaymentStripePolicy@create');
        Gate::define('payment-stripe-edit','App\Policies\PaymentStripePolicy@update');
        Gate::define('payment-stripe-delete','App\Policies\PaymentStripePolicy@delete');
    }

    public function defineGateNotification(){
        Gate::define('notification-list','App\Policies\NotificationPolicy@view');
        Gate::define('notification-add','App\Policies\NotificationPolicy@create');
        Gate::define('notification-edit','App\Policies\NotificationPolicy@update');
        Gate::define('notification-delete','App\Policies\NotificationPolicy@delete');
    }

    public function defineGatePost(){
        Gate::define('post-list','App\Policies\PostPolicy@view');
        Gate::define('post-add','App\Policies\PostPolicy@create');
        Gate::define('post-edit','App\Policies\PostPolicy@update');
        Gate::define('post-delete','App\Policies\PostPolicy@delete');
    }

}
