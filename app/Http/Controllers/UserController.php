<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Invoice;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductTag;
use App\Models\Tag;
use App\Models\Trading;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{

    private $user;
    private $product;
    private $trading;
    private $invoice;

    public function __construct(User $user, Product $product, Trading $trading, Invoice $invoice)
    {
        $this->user = $user;
        $this->product = $product;
        $this->invoice = $invoice;
        $this->trading = $trading;
    }

    public function index(){
        return view('user.home.index');
    }

    public function sources(){
        $products = $this->invoice->select('products.*')
            ->join('products', 'products.id', '=', 'invoices.product_id')
            ->where('invoices.user_id', auth()->id())
            ->latest('invoices.id')
            ->paginate(10);

        return view('user.my_sources.index', compact('products'));
    }

    public function paymentProduct($id){
        $product = $this->product->find($id);
        return view('payment.product', compact('product'));
    }

    public function paymentTrading($id){
        $product = $this->trading->find($id);
        return view('payment.trading', compact('product'));
    }

}
