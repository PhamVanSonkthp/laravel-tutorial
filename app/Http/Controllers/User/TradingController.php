<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\InvoiceTrading;
use App\Models\Product;
use App\Models\Trading;
use App\Models\User;
use function auth;
use function view;

class TradingController extends Controller
{

    private $user;
    private $trading;
    private $invoiceTrading;

    public function __construct(User $user, Trading $trading, InvoiceTrading $invoiceTrading)
    {
        $this->user = $user;
        $this->invoiceTrading = $invoiceTrading;
        $this->trading = $trading;
    }

    public function index(){
        $tradings = $this->trading->select('tradings.*')
            ->join('invoice_tradings', 'tradings.id', '=', 'invoice_tradings.trading_id')
            ->where('invoice_tradings.user_id', auth()->id())
            ->latest('invoice_tradings.id')
            ->paginate(10);
        return view('user.trading.index', compact('tradings'));
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
