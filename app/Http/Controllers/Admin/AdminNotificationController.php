<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\PaymentStripe;
use App\Models\Source;
use App\Models\Topic;
use App\Traits\DeleteModelTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use function redirect;
use function view;

class AdminNotificationController extends Controller
{
    use DeleteModelTrait;
    private $notification;

    public function __construct(Notification $notification)
    {
        $this->notification = $notification;
    }

    public function index()
    {
        $notifications = $this->notification->latest()->paginate(10);
        return view('administrator.notification.index' , compact('notifications'));
    }

    public function delete($id)
    {
        return $this->deleteModelTrait($id, $this->notification);
    }
}
