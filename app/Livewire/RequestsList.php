<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;


class RequestsList extends Component
{
    public $userId;
    protected $listeners = ['confirmUser'=>'refresh' ,'removeFollower'=>'refresh','followEvent'=>'refresh' ];

    public function confirm($requestedUserId){
         $user = User::find($this->userId);
         $user->confirmFollower($requestedUserId);
         $this->dispatch('confirmUser');
    }
      public function removeFollower(User $follower)
    {
        $user = User::find($this->userId);
        $follower->unfollow($user);
        $this->dispatch('removeFollower');
    }
    public function getRequestsProperty()
    {
        $user = User::find($this->userId);
        return $user->pendingRequest();
    }

    public function render()
    {
        return view('livewire.requests-list');
    }
}
