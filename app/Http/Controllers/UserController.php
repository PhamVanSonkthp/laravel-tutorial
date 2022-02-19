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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
        $products = $this->invoice->select('products.*')
            ->join('products', 'products.id', '=', 'invoices.product_id')
            ->where('invoices.user_id', auth()->id())
            ->latest('invoices.id')
            ->paginate(10);

        return view('user.my_sources.index', compact('products'));
    }

    public function payment($id){

        try {
            DB::beginTransaction();

            $product = $this->product->find($id);

            $this->invoice->create([
                'user_id'=> auth()->id(),
                'product_id'=> $id,
                'price'=> $product->price,
            ]);

            $user = $this->user->find(auth()->id());
            $user->increment('point' , $product->point);
            $user->save();
            DB::commit();
        }catch (\Exception $exception){
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . 'Line' . $exception->getLine());
        }

        return redirect()->route('user.sources' );
    }

}
