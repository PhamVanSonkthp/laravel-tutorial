<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Invoice;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductTag;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    private $user;
    private $product;
    private $invoice;

    public function __construct(User $user, Product $product, Invoice $invoice)
    {
        $this->user = $user;
        $this->product = $product;
        $this->invoice = $invoice;
    }

    public function index(){
        return view('user.home.index');
    }

    public function sources(){
        $products = $this->product->latest()->paginate(10);
        return view('user.my_sources.index', compact('products'));
    }

    public function payment($id){
        $this->invoice->create([
            'user_id'=> auth()->id(),
            'product_id'=> $id,
        ]);
        return view('user.my_sources.index');
    }

    public function register(){
        return view('user.authention.register');
    }
}
