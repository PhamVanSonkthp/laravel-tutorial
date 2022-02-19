<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function index(){
        $products = $this->product->latest()->get();
        return view('user.home.index' , compact('products'));
    }

    public function source($id){
        $product = $this->product->find($id);
        return view('user.home.source', compact('product'));
    }

    public function invoice($id){
        $product = $this->product->find($id);
        return view('user.home.invoice', compact('product'));
    }
}
