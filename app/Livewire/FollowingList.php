<?php

namespace App\Livewire;

use App\Models\User;
use LivewireUI\Modal\ModalComponent;

class FollowingList extends ModalComponent
{
    protected $user;
    public $user_id;

    protected $listeners = ['followEvent' => 'refresh'];

    public function getFollowingProperty()
    {
        $this->user = User::find($this->user_id);

        return $this->user->following()->wherePivot('confirmed', true)->get();
    }

 

    public function render()
    {
        return view('livewire.following-list');
    }
}
