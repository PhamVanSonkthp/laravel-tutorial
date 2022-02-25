<?php

namespace App\Http\Controllers;

use App\Models\Process;
use App\Models\Product;
use App\Models\Slider;
use App\Models\Source;
use App\Models\Trading;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    private $product;
    private $trading;
    private $source;
    private $process;
    private $sliders;

    public function __construct(Product $product, Trading $trading, Source $source, Process $process, Slider $slider)
    {
        $this->product = $product;
        $this->trading = $trading;
        $this->source = $source;
        $this->process = $process;
        $this->slider = $slider;
    }

    public function index(){
        $sliders = $this->slider->take(5)->latest()->get();
        $products = $this->product->take(8)->latest()->get();
        $tradings = $this->trading->take(8)->latest()->get();
        return view('user.home.index' , compact('products', 'tradings','sliders'));
    }

    public function product($id){
        $product = $this->product->find($id);

        $counter = 0;
        $sourcesBelongTopics = $this->source->where('topic_id', $product->topic->id)->get();

        foreach ($sourcesBelongTopics as $sourcesBelongTopicItem) {
            $counter += $sourcesBelongTopicItem->sourceChildren->count();
        }

        $processesd = [];

        if(auth()){
            $processesd = $this->process->where('user_id' , auth()->id())->get();
        }

        return view('user.home.product', compact('product', 'counter','processesd'));
    }

    public function invoiceProduct($id){
        $product = $this->product->find($id);
        return view('user.home.invoice-product', compact('product'));
    }
}
