<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Invoice extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;

    protected $guarded = [];

    public function product(){
        return $this->hasOne(Product::class , 'id' , 'product_id');
    }

    public function user(){
        return $this->hasOne(User::class , 'id' , 'user_id');
    }

    public function getTotalPrice() {
        return $this->all()->sum(function ($detail) {
            return $detail->price;
        });
    }

    public function isExpired($id)
    {
        $invoice = Invoice::find($id);
        $product = Trading::find($invoice->product_id);
        return ($product->time_payment_again == 0 || (strtotime("+1 month", (new DateTime($invoice->updated_at))->getTimestamp()) >= (new DateTime())->getTimestamp()));
    }

}
