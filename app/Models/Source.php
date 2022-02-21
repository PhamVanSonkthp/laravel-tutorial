<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function sourceChildren(){
        return $this->hasMany(Source::class, 'parent_id' );
    }

    public function topic(){
        return $this->hasOne(Topic::class, 'id', 'topic_id');
    }
}
