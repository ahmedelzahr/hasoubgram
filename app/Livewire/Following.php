<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Following extends Component
{
    protected $listeners=['followEvent'=>'refresh'];
    protected $user;
    public $user_id;
    public function getFollowingCountProperty()
    {
        $this->user = User::find($this->user_id);
        return $this->user->following()->wherePivot('confirmed',true)->count();
    }

    public function render()
    {
        return view('livewire.following');
    }
}
