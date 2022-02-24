<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Process;
use App\Models\Product;
use App\Models\Trading;
use App\Models\User;
use function auth;
use function view;

class UserController extends Controller
{

    private $user;
    private $product;
    private $trading;
    private $invoice;
    private $process;

    public function __construct(User $user, Product $product, Trading $trading, Invoice $invoice, Process $process)
    {
        $this->user = $user;
        $this->product = $product;
        $this->invoice = $invoice;
        $this->trading = $trading;
        $this->process = $process;
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

        $invoices = $this->invoice->where('user_id' , auth()->id())->paginate(10);
        $processes = [];
        $processesd = $this->process->where('user_id' , auth()->id())->get();

        $counterProcessesd = [];

        foreach ($invoices as $invoice){
            $counter = 0;
            $counterProcessed = 0;
            $sourceChildren = optional($invoice->product->topic)->sourceChildren;
            if(!empty($sourceChildren)){
                foreach ($sourceChildren as $source){
                    $sources = $source->where('parent_id' , $source->id)->get();
                    $counter += count($sources);

                    for($i = 0 ; $i < count($processesd) ; $i++){
                        for($j = 0 ; $j < count($sources) ; $j++){
                            if($processesd[$i]->source_id == $sources[$j]->id){
                                $counterProcessed++;
                            }
                        }
                    }

                }
            }

            $processes[] = $counter;
            $counterProcessesd[] = $counterProcessed;
        }

        return view('user.my_sources.index', compact('products', 'processes' , 'counterProcessesd'));
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
