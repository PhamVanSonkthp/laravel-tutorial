<?php

namespace App\Models;

use App\Traits\UserTrait;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use UserTrait;
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'point',
        'phone',
        'is_admin',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles(){
        return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id');
    }

    public function checkPermissionAccess($permissionCheck){
        $roles = auth()->user()->roles;
        foreach ($roles as $role){
            $permissions = $role->permissions;
            if($permissions->contains('key_code' , $permissionCheck)){
                return true;
            }
        }
        return false;
    }

    public function getUserLevel($id){
        return $this->getUserLevelTrait($id);
    }

    public function getUserNumberProduct($id){
        return $this->getUserNumberProductTrait($id);
    }

    public function getUserNumberTrading($id){
        return $this->getUserNumberTradingTrait($id);
    }
}
