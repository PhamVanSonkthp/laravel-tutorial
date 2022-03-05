<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class InvoiceTrading extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;

//    use SoftDeletes;
    protected $guarded = [];

    public function trading()
    {
        return $this->hasOne(Trading::class, 'id', 'trading_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function isExpired($id, $user_id = null)
    {
        try {

            if (empty($user_id)) {
                $user_id = auth()->id();
            }

            $invoiceTrading = InvoiceTrading::where("id", $id)->where("user_id", $user_id)->first();

            if (empty($invoice)) {
                return true;
            }

            $trading = Trading::find($invoiceTrading->trading_id);
            return ($trading->time_payment_again == 0 || (strtotime("+1 month", (new DateTime($invoiceTrading->updated_at))->getTimestamp()) >= (new DateTime())->getTimestamp()));

        } catch (\Exception $exception) {
            return true;
        }

    }
}
