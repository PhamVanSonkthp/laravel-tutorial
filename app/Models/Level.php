<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Level extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
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
