<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\InvoiceTrading;
use function view;

class InvoiceController extends Controller
{
    private $invoice;
    private $invoiceTrading;

    public function __construct(Invoice $invoice, InvoiceTrading $invoiceTrading)
    {
        $this->invoice = $invoice;
        $this->invoiceTrading = $invoiceTrading;
    }


    public function index(){
        $invoices = $this->invoice->where('user_id', auth()->id())->latest()->paginate(10);
        $invoiceTradings = $this->invoiceTrading->where('user_id', auth()->id())->latest()->paginate(10);
        return view('user.invoices.index' , compact('invoices', 'invoiceTradings'));
    }
}
