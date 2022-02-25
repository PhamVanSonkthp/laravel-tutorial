<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Source;
use App\Models\Topic;
use App\Traits\DeleteModelTrait;
use Illuminate\Http\Request;
use function redirect;
use function view;

class AdminTopicController extends Controller
{
    use DeleteModelTrait;
    private $topic;
    private $product;
    private $source;

    public function __construct(Topic $topic, Product $product, Source $source)
    {
        $this->topic = $topic;
        $this->product = $product;
        $this->source = $source;
    }

    public function index(){
        $topics = $this->topic->latest()->paginate(10);

        $counters = [];
        foreach ($topics as $topicItem){
            $counter = 0;
            $sourcesBelongTopics = $this->source->where('topic_id', $topicItem->id)->get();

            foreach ($sourcesBelongTopics as $sourcesBelongTopicItem){
                $counter += $sourcesBelongTopicItem->sourceChildren->count();
            }
            $counters[] = $counter;
        }

        return view('administrator.topics.index' , compact('topics', 'counters'));
    }

    public function create(){
        $products = $this->product->all();
        return view('administrator.topics.add' , compact('products'));
    }

    public function store(Request $request){
        $this->topic->create([
            'product_id'=>$request->product_id ?? 0,
            'name'=>$request->name,
        ]);

        return redirect()->route('administrator.topics.index');
    }

    public function edit($id){
        $topic = $this->topic->find($id);
        $products = $this->product->all();
        return view('administrator.topics.edit' , compact('topic' , 'products'));
    }

    public function update($id, Request $request){
        $this->topic->find($id)->update([
            'product_id'=>$request->product_id ?? 0,
            'name'=>$request->name,
        ]);
        return redirect()->route('administrator.topics.index');
    }

    public function delete($id){
        return $this->deleteModelTrait($id, $this->topic);
    }
}
