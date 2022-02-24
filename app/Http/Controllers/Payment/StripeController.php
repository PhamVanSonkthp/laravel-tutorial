<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\InvoiceTrading;
use App\Models\PaymentStripe;
use App\Models\Product;
use App\Models\Trading;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Stripe;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class StripeController extends Controller
{
    private $product;
    private $trading;
    private $invoice;
    private $invoiceTrading;
    private $user;
    private $paymentStripe;

    public function __construct(Product $product, User $user, Invoice $invoice, Trading $trading, InvoiceTrading $invoiceTrading, PaymentStripe $paymentStripe)
    {
        $this->product = $product;
        $this->trading = $trading;
        $this->invoice = $invoice;
        $this->invoiceTrading = $invoiceTrading;
        $this->user = $user;
        $this->paymentStripe = $paymentStripe;
    }

    public function stripePaymentProduct($id, Request $req){
        $product = $this->product->find($id);

        $paymentStripe = $this->paymentStripe->first();
        Stripe\Stripe::setApiKey($paymentStripe->secret_key);
        $data = Stripe\Charge::create([
            "amount" => $product->price * 100,
            "currency" => "usd",
            "source" => $req->stripeToken,
            "description" => optional(Auth::user())->name . " Buy " . $product->name
        ]);




        if ($data->created) {
            try {
                DB::beginTransaction();

                $this->invoice->create([
                    'user_id' => auth()->id(),
                    'product_id' => $id,
                    'price' => $product->price,
                ]);


                $user = $this->user->find(auth()->id());
                $user->increment('point', $product->point);
                $user->save();
                DB::commit();
            } catch (\Exception $exception) {
                DB::rollBack();
                Log::error('Message: ' . $exception->getMessage() . 'Line' . $exception->getLine());
            }
            Session::flash("success", "Payment successfully!");
        }

        return back();
    }

    public function stripePaymentTrading($id, Request $req){
        $trading = $this->trading->find($id);

        $paymentStripe = $this->paymentStripe->first();
        Stripe\Stripe::setApiKey($paymentStripe->secret_key);
        $data = Stripe\Charge::create([
            "amount" => $trading->price * 100,
            "currency" => "usd",
            "source" => $req->stripeToken,
            "description" => optional(Auth::user())->name . " Buy " . $trading->name
        ]);

        if ($data->created) {
            try {
                DB::beginTransaction();

                $this->invoiceTrading->create([
                    'user_id' => auth()->id(),
                    'trading_id' => $id,
                    'price' => $trading->price,
                ]);

                $user = $this->user->find(auth()->id());
                $user->increment('point', $trading->point);
                $user->save();
                DB::commit();
            } catch (\Exception $exception) {
                DB::rollBack();
                Log::error('Message: ' . $exception->getMessage() . 'Line' . $exception->getLine());
            }
            Session::flash("success", "Payment successfully!");
        }

        return back();
    }
}
