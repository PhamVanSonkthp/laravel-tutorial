<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\Notifications;

class NotificationController extends Controller
{
    private $user;

    public function __construct( User $user)
    {
        $this->user = $user;
    }


    public function sendNotification(){
        $user = $this->user->first();

        $notificationData = [
            'body'=>'a',
            'text'=>'b',
            'url'=>url('/'),
            'thankyou'=>'d',
        ];

        $user->notify(new Notifications($notificationData));
    }
}
