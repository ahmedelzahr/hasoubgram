<?php

namespace App\Livewire;

use App\Models\User;
use LivewireUI\Modal\ModalComponent;

class FollowerList extends ModalComponent
{
    protected $user;

    public $user_id;

    protected $listeners = ['removeFollower' => 'refresh'];

    public function getFollowersProperty()
    {
        $this->user = User::find($this->user_id);

        return $this->user->follower()->wherePivot('confirmed', true)->get();
    }

    public function removeFollower(User $follower)
    {
        $this->user = User::find($this->user_id);
        $follower->unfollow($this->user);
        $this->dispatch('removeFollower');
    }

    public function render()
    {
        return view('livewire.follower-list');
    }
}
