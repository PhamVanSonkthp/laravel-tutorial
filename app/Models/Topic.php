<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Topic extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;

    protected $guarded = [];

    public function product(){
        return $this->hasOne(Product::class , 'id' , 'product_id');
    }

    public function sourceChildren(){
        return $this->hasMany(Source::class , 'topic_id');
    }

}
