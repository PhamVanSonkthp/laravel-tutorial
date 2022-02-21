<?php

namespace App\Http\Controllers;

use App\Http\Requests\LevelAddRequest;
use App\Http\Requests\LevelEditRequest;
use App\Http\Requests\UserAddRequest;
use App\Models\Invoice;
use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

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

    public function create(){
        return view('administrator.levels.add' );
    }

    public function store(LevelAddRequest $request){
        $this->level->create([
            'level'=>$request->level,
            'point_require'=>$request->point_require,
        ]);

        return redirect()->route('administrator.levels.index');
    }

    public function edit($id){
        $level = $this->level->find($id);
        return view('administrator.levels.edit' , compact('level'));
    }

    public function update($id, LevelEditRequest $request){
        $this->level->find($id)->update([
            'level'=>$request->level,
            'point_require'=>$request->point_require,
        ]);
        return redirect()->route('administrator.levels.index');
    }
}
