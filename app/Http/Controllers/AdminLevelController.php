<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Level;
use Illuminate\Http\Request;

class AdminLevelController extends Controller
{
    private $level;

    public function __construct(Level $level)
    {
        $this->level = $level;
    }


    public function index(){
        $levels = $this->level->latest()->paginate(10);
        return view('administrator.levels.index' , compact('levels'));
    }
}
