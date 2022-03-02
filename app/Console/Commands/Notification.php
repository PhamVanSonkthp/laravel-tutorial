<?php

namespace App\Console\Commands;

use App\Models\Invoice;
use App\Models\InvoiceTrading;
use App\Models\User;
use App\Notifications\Notifications;
use DateTime;
use Illuminate\Console\Command;

class Notification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:notification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send notification to user';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $invoices = Invoice::all();
        foreach ($invoices as $invoiceItem) {
            $product = $invoiceItem->product();
            if( $product->time_payment_again == 0 || (new DateTime($product->updated_at))->diff(new DateTime())->m  != 0 ){
                $user = $invoiceItem->user();

                $notificationData = [
                    'body'=>'Khóa học "' . $product->name .'" của bạn sắp hết hạn, vui lòng truy cập "Khóa học của tôi" để gia hạn',
                    'text'=>'Gia hạn ngay',
                    'url'=>route('user.sources'),
                    'thankyou'=>'Cảm ơn bạn đã sử dụng dịch vụ!',
                ];

                $user->notify(new Notifications($notificationData));

            }
        }

        $invoiceTradings = InvoiceTrading::all();
        foreach ($invoiceTradings as $invoiceTradingItem) {
            $trading = $invoiceTradingItem->trading();
            if( $trading->time_payment_again == 0 || (new DateTime($trading->updated_at))->diff(new DateTime())->m  != 0 ){
                $user = $invoiceTradingItem->user();

                $notificationData = [
                    'body'=>'Trading "' . $trading->name .'" của bạn sắp hết hạn, vui lòng truy cập "Trading của tôi" để gia hạn',
                    'text'=>'Gia hạn ngay',
                    'url'=>route('user.tradings'),
                    'thankyou'=>'Cảm ơn bạn đã sử dụng dịch vụ!',
                ];

                $user->notify(new Notifications($notificationData));

            }
        }

    }
}
