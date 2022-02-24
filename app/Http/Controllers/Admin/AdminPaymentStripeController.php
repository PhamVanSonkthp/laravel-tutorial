<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentStripe;
use App\Models\Source;
use App\Models\Topic;
use App\Traits\DeleteModelTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use function redirect;
use function view;

class AdminPaymentStripeController extends Controller
{

    private $paymentStripe;

    public function __construct(PaymentStripe $paymentStripe)
    {
        $this->paymentStripe = $paymentStripe;
    }

    public function index()
    {
        $paymentStripe = $this->paymentStripe->first();

        if(empty($paymentStripe)){
            $this->paymentStripe->create([
                "public_key" => "your_key",
                "secret_key" => "your_key",
            ]);

            $paymentStripe = $this->paymentStripe->first();
        }

        return view('administrator.payment_stripe.index', compact('paymentStripe'));
    }

    public function store(Request $request)
    {
        $this->paymentStripe->first()->update([
            'public_key' => $request->public_key,
            'secret_key' => $request->secret_key,
        ]);

        return redirect()->route('administrator.payment_stripe.index');
    }
}
