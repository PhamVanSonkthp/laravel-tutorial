<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function product(){
        return $this->hasOne(Product::class , 'id' , 'product_id');
    }

    public function sourceChildren(){
        return $this->hasMany(Source::class , 'topic_id');
    }

}
