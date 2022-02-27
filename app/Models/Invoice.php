<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Invoice extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function product(){
        return $this->hasOne(Product::class , 'id' , 'product_id');
    }

    public function user(){
        return $this->hasOne(User::class , 'id' , 'user_id');
    }

    public function getTotalPrice() {
        return $this->all()->sum(function ($detail) {
            return $detail->price;
        });
    }


}
