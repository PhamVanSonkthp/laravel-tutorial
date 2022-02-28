<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function gift(){
        return $this->hasOne(Gift::class);
    }


    public function calculateLevel($id, $point){
        $level = Level::find($id);
        return ($point * 100) / $level->point_require;
    }
}
