<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\InvoiceTrading;
use function view;

class AdminInvoiceController extends Controller
{
    private $invoice;
    private $invoiceTrading;

    public function __construct(Invoice $invoice, InvoiceTrading $invoiceTrading)
    {
        $this->invoice = $invoice;
        $this->invoiceTrading = $invoiceTrading;
    }


    public function index(){
        $invoices = $this->invoice->latest()->paginate(10);
        $invoiceTradings = $this->invoiceTrading->latest()->paginate(10);
        return view('administrator.invoices.index' , compact('invoices', 'invoiceTradings'));
    }
}
