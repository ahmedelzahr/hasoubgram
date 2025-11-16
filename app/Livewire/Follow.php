<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Follow extends Component
{
    public $targetedUser;
    public $isFollowing;
    public $isPending;
    public $showButton;

    public function mount($targetedUser)
    {
        $this->$targetedUser = $targetedUser;
        $this->updateFollowingStatus();
    }

    public function toggleUser()
    {
        if ($this->isFollowing) {
            auth()->user()->unfollow($this->targetedUser);
        } elseif (! $this->isPending) {
            auth()->user()->follow($this->targetedUser);
        }

        $this->updateFollowingStatus();
        $this->dispatch('followEvent');

    }

    public function updateFollowingStatus()
    {
        $this->isFollowing = auth()->user()->isFollowing($this->targetedUser);
        $this->isPending = auth()->user()->isPending($this->targetedUser);
    }



    // if the current user follow the targrted user then show icon unfollow if click on the icon make follow/pending and change the icon to unfollow
    // if the current user not follow the targrted user then show icon follow if click on the icon make unfollow and change the icon to unfollow
    // if the current user waiting confirmation the targrted user then show icon pending
    public function render()
    {
        return view('livewire.follow');
    }
}
