<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class AdminInvoiceController extends Controller
{
    private $invoice;

    /**
     * @param $invoice
     */
    public function __construct(Invoice $invoice)
    {
        $this->invoice = $invoice;
    }


    public function index(){
        $invoices = $this->invoice->latest()->paginate(10);
        return view('administrator.invoices.index' , compact('invoices'));
    }
}
