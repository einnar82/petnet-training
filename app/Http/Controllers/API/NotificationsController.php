<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\API\TestNotification;

class NotificationsController extends Controller
{
    /**
     * Notify a user
     */
    public function notify(Request $request)
    {
        auth()->user()->notify(new TestNotification($request->all()));
    }

    /**
     * Get all notifications
     */
    public function all()
    {
        return auth()->user()->notifications;
    }

    /**
     * Mark as read the unread notification
     */

    public function read()
    {
        auth()->user()->unreadNotifications->markAsRead();
    }
}
