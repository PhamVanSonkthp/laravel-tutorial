<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gift extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function level_id(){
        return $this->hasOne(Level::class , 'id' , 'level_id');
    }

    public function level(){
        return $this->hasOne(Level::class , 'id' , 'level_id');
    }

    public function giftChildren(){
        return $this->hasMany(Gift::class , 'parent_id');
    }
}
