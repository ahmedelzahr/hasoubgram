<?php

namespace App\Livewire;

use Illuminate\Notifications\DatabaseNotification;
use Livewire\Component;

class Notification extends Component
{
    Public DatabaseNotification $notification;
    public function readAndRedirect(){
     
        redirect(route('show_post', $this->notification->data['postSlug']));
        $this->notification->markAsRead();

    }
    public function render()
    {
        return view('livewire.notification');
    }
}
