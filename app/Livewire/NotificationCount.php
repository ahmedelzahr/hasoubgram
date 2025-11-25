<?php

namespace App\Livewire;

use Livewire\Component;

class NotificationCount extends Component
{

        public function getCountProperty()
    {
        
         
        return auth()->user()->unreadNotifications()->count();
    }
    public function render()
    {
        return view('livewire.notification-count');
    }
}
