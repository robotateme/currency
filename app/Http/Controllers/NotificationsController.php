<?php


namespace App\Http\Controllers;


use App\Http\Resources\NotificationResource;
use App\Models\Notification;

class NotificationsController extends Controller
{
    public function index()
    {
        return NotificationResource::collection(
            Notification::paginate()
        );
    }
}
