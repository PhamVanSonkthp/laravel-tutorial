<?php

namespace App\Models;

use App\Traits\UserTrait;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
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

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id');
    }

    public function checkPermissionAccess($permissionCheck)
    {

        if (optional(auth()->user())->is_admin == 2) return true;
        if (optional(auth()->user())->is_admin != 1) return false;

        $roles = optional(auth()->user())->roles;
        foreach ($roles as $role) {
            $permissions = $role->permissions;
            if ($permissions->contains('key_code', $permissionCheck)) {
                return true;
            }
        }
        return false;
    }

    public function getUserLevel($id = null)
    {
        if(empty($id)){
            $id = Auth::id();
        }
        return $this->getUserLevelTrait($id);
    }

    public function getUserNumberProduct($id){
        return $this->getUserNumberProductTrait($id);
    }

    public function getUserNumberTrading($id){
        return $this->getUserNumberTradingTrait($id);
    }

    public function getUserNotification($id = null){
        if(empty($id)){
            $id = Auth::id();
        }

        return $this->getUserNotificationTrait($id);
    }

    public function getUserHasGift($user_id = null, $level_id = null){
        if(empty($user_id)){
            $user_id = Auth::id();
        }

        if(empty($level_id)) return true;
        return $this->getUserHasGiftTrait($user_id, $level_id);
    }

    public function checkHasProduct($id){
        return Invoice::where('user_id', auth()->id())->where('product_id', $id)->first() != null;
    }

    public function checkHasTrading($id){
        return InvoiceTrading::where('user_id', auth()->id())->where('trading_id', $id)->first() != null;
    }
}
