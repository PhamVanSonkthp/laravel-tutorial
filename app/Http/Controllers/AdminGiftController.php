<?php

namespace App\Http\Controllers;

use App\Http\Requests\GiftAddRequest;
use App\Http\Requests\GiftEditRequest;
use App\Models\Gift;
use App\Models\Level;
use App\Traits\DeleteModelTrait;

class AdminGiftController extends Controller
{
    use DeleteModelTrait;
    private $gift;
    private $level;

    public function __construct(Gift $gift , Level $level)
    {
        $this->gift = $gift;
        $this->level = $level;
    }

    public function index(){
        $gifts = $this->gift->latest()->paginate(10);
        return view('administrator.gifts.index' , compact('gifts'));
    }

    public function create(){
        $levels = $this->level->all();
        return view('administrator.gifts.add' , compact('levels'));
    }

    public function store(GiftAddRequest $request){
        $this->gift->create([
            'level_id'=>$request->level_id,
            'name'=>$request->name,
            'content'=>$request->contents,
        ]);

        return redirect()->route('administrator.gifts.index');
    }

    public function edit($id){
        $levels = $this->level->all();
        $gift = $this->gift->find($id);
        return view('administrator.gifts.edit' , compact('levels' , 'gift'));
    }

    public function update($id, GiftEditRequest $request){
        $this->gift->find($id)->update([
            'level_id'=>$request->level_id,
            'name'=>$request->name,
            'content'=>$request->contents,
        ]);
        return redirect()->route('administrator.gifts.index');
    }

    public function delete($id){
        return $this->deleteModelTrait($id, $this->gift);
    }
}
