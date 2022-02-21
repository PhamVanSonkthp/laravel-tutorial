<?php

namespace App\Http\Controllers;

use App\Http\Requests\GiftAddRequest;
use App\Http\Requests\GiftEditRequest;
use App\Models\Gift;
use App\Models\Level;
use App\Models\Product;
use App\Models\Source;
use App\Models\Topic;
use App\Traits\DeleteModelTrait;
use Illuminate\Http\Request;

class AdminTopicController extends Controller
{
    use DeleteModelTrait;
    private $topic;
    private $product;

    public function __construct(Topic $topic, Product $product)
    {
        $this->topic = $topic;
        $this->product = $product;
    }

    public function index(){
        $topics = $this->topic->latest()->paginate(10);
        return view('administrator.topics.index' , compact('topics'));
    }

    public function create(){
        $products = $this->product->all();
        return view('administrator.topics.add' , compact('products'));
    }

    public function store(Request $request){
        $this->topic->create([
            'product_id'=>$request->product_id,
            'name'=>$request->name,
        ]);

        return redirect()->route('administrator.topics.index');
    }

    public function edit($id){
        $levels = $this->level->all();
        $gift = $this->gift->find($id);
        return view('administrator.topics.edit' , compact('levels' , 'gift'));
    }

    public function update($id, GiftEditRequest $request){
        $this->gift->find($id)->update([
            'level_id'=>$request->level_id,
            'name'=>$request->name,
            'content'=>$request->contents,
        ]);
        return redirect()->route('administrator.topics.index');
    }

    public function delete($id){
        return $this->deleteModelTrait($id, $this->gift);
    }
}
