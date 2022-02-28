<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Notifications\Notifications;
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
        $inactive_user = User::get();
        foreach ($inactive_user as $user) {

            $notificationData = [
                'body'=>'Hóa đơn của bạn sắp hết hạn, vui lòng truy cập "Hóa đơn" để gia hạn',
                'text'=>'Gia hạn',
                'url'=>url('/'),
                'thankyou'=>'Xin cảm ơn!',
            ];

            $user->notify(new Notifications($notificationData));
        }
    }
}
