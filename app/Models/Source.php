<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Source extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;

    protected $guarded = [];

    public function sourceChildren(){
        return $this->hasMany(Source::class, 'parent_id' )->orderBy('order');
    }

    public function topic(){
        return $this->hasOne(Topic::class, 'id', 'topic_id');
    }

    public function process(){
        return $this->hasOne(Process::class , 'source_id');
    }
}
