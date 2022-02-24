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

    public function product($id){
        $product = $this->product->find($id);
        return view('user.home.product', compact('product'));
    }

    public function invoiceProduct($id){
        $product = $this->product->find($id);
        return view('user.home.invoice-product', compact('product'));
    }
}
