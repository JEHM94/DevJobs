<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //  Gets unread notifications
        $notifications = auth()->user()->unreadNotifications;

        //  Gets all notifications
        $totalNotifications = auth()->user()->notifications->count();

        // Marks unread notifications as read
        auth()->user()->unreadNotifications->markAsRead();


        return view('notifications.index', [
            'notifications' => $notifications,
            'totalNotifications' => $totalNotifications
        ]);
    }

    public function old()
    {
        //  Gets all notifications
        $notifications = auth()->user()->notifications;

        return view('notifications.old', [
            'notifications' => $notifications,
        ]);
    }
}
