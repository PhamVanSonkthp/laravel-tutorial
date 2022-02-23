<?php

namespace App\Traits;

use App\Models\Invoice;
use App\Models\InvoiceTrading;
use App\Models\Level;
use App\Models\Trading;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait UserTrait{

    public function getUserLevelTrait($id){
        $user = User::find($id);
        if(empty($user)) return 0;

        $levels = Level::orderBy('point_require', 'desc')->get();

        foreach ($levels as $level){
            if($user->point >= $level->point_require) return $level->level;
        }

        return 0;
    }

    public function getUserNumberProductTrait($id){
        return Invoice::where('user_id' , $id)->get()->count();
    }

    public function getUserNumberTradingTrait($id){
        return InvoiceTrading::where('user_id' , $id)->get()->count();
    }
}
