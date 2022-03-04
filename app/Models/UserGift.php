<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class UserGift extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;

    protected $guarded = [];

    public function user(){
        return $this->hasOne(User::class , 'id' , 'user_id');
    }

    public function level(){
        return $this->hasOne(Level::class , 'id' , 'level_id');
    }
}
