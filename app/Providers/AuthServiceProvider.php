<?php

namespace App\Providers;

use App\Models\Product;
use App\Services\PermissionGateAndPolicyAccess;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        $permissionGateAndPolicy = new PermissionGateAndPolicyAccess();

        $permissionGateAndPolicy->setGateAndPolicyAccess();

//        Gate::define('product-edit' , function ($user, $id){
//            $product = Product::find($id);
//            return $user->checkPermissionAccess('product_edit') && $user->id === $product->user_id;
//        });
//
//        Gate::define('product-list' , function ($user){
//
//            return $user->checkPermissionAccess('product_list') ;
//        });
    }


}
