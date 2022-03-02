<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostTrading;
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
    private $slider;
    private $post;
    private $postTrading;

    public function __construct(Product $product, Trading $trading, Source $source, Process $process, Slider $slider, Post $post, PostTrading $postTrading)
    {
        $this->product = $product;
        $this->trading = $trading;
        $this->source = $source;
        $this->process = $process;
        $this->slider = $slider;
        $this->post = $post;
        $this->postTrading = $postTrading;
    }

    public function index()
    {
        $sliders = $this->slider->take(5)->latest()->get();
        $products = $this->product->take(8)->latest()->get();
        $tradings = $this->trading->take(8)->latest()->get();
        $posts = $this->post->take(8)->latest()->get();
        $postTradings = $this->postTrading->take(8)->latest()->get();
        return view('user.home.index', compact('products', 'tradings', 'sliders', 'posts', 'postTradings'));
    }

    public function search()
    {
        if(isset($_GET['search_query'])){
            $products = $this->product->orWhere('name', 'like', '%' . $_GET['search_query'] . '%')->take(8)->latest()->get();
            $tradings = $this->trading->orWhere('name', 'like', '%' . $_GET['search_query'] . '%')->take(8)->latest()->get();
            $posts = $this->post->orWhere('title', 'like', '%' . $_GET['search_query'] . '%')->take(8)->latest()->get();

            return view('user.home.search', compact('products', 'tradings', 'posts'));
        }else{
            $products = $this->product->take(8)->latest()->get();
            $tradings = $this->trading->take(8)->latest()->get();
            $posts = $this->post->take(8)->latest()->get();

            return view('user.home.search', compact('products', 'tradings', 'posts'));
        }

    }

    public function tradings()
    {
        $tradings = $this->trading->take(40)->latest()->get();
        return view('user.tradings.index', compact('tradings'));
    }

    public function products()
    {
        $products = $this->product->take(40)->latest()->get();
        return view('user.sources.index', compact('products'));
    }

    public function posts()
    {
        $posts = $this->post->take(40)->latest()->get();
        return view('user.posts.index', compact('posts'));
    }

    public function postTradings()
    {
        $posts = $this->postTrading->take(40)->latest()->get();
        return view('user.post_tradings.index', compact('posts'));
    }

    public function product($slug)
    {
        $product = $this->product->where('slug', $slug)->first();

        $product->increment('views_count');
        $product->save();

        $counter = 0;
        $sourcesBelongTopics = $this->source->where('topic_id', optional($product->topic)->id)->get();

        foreach ($sourcesBelongTopics as $sourcesBelongTopicItem) {
            $counter += $sourcesBelongTopicItem->sourceChildren->count();
        }

        $processesd = [];

        if (auth()) {
            $processesd = $this->process->where('user_id', auth()->id())->get();
        }

        return view('user.home.product', compact('product', 'counter', 'processesd'));
    }

    public function trading($slug)
    {
        $trading = $this->trading->where('slug', $slug)->first();

        $trading->increment('views_count');
        $trading->save();

        return view('user.home.trading', compact('trading'));
    }

    public function post($slug)
    {
        $post = $this->post->where('slug', $slug)->first();
        $post->increment('views_count');
        $post->save();

        $postRelates = $this->post->where('id', '!=', $post->id)->take(8)->latest()->get();
        return view('user.home.post', compact('post', 'postRelates'));
    }

    public function postTrading($slug)
    {
        $post = $this->postTrading->where('slug', $slug)->first();
        $post->increment('views_count');
        $post->save();

        $postRelates = $this->postTrading->where('id', '!=', $post->id)->take(8)->latest()->get();
        return view('user.home.post_trading', compact('post', 'postRelates'));
    }

    public function invoiceProduct($id)
    {
        $product = $this->product->find($id);
        return view('user.home.invoice-product', compact('product'));
    }
}
