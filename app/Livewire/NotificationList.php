<?php

namespace App\Livewire;

use App\Notifications\LikeNotification;
use Livewire\Component;

class NotificationList extends Component
{
    public function getNotificationsProperty()
    {
        return auth()->user()->unreadNotifications;
    }

 

    public function render()
    {
        return view('livewire.notification-list');
    }
}
