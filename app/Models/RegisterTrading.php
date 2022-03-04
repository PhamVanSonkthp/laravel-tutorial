<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class RegisterTrading extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;
//    use SoftDeletes;
    protected $guarded = [];

    public function trading(){
        return $this->hasOne(Trading::class , 'id' , 'trading_id' );
    }

    public function user(){
        return $this->hasOne(User::class , 'id' , 'user_id' );
    }
}
