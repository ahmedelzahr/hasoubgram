<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Follower extends Component
{
    protected $user;

    public $user_id;

    protected $listeners = ['removeFollower' => 'refresh'];

    public function getFollowerCountProperty()
    {
        $this->user = User::find($this->user_id);

        return $this->user->follower()->wherePivot('confirmed', true)->count();
    }

    public function render()
    {
        return view('livewire.follower');
    }
}
