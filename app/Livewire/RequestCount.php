<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class RequestCount extends Component
{
    protected $listeners = ['confirmUser' => 'refresh', 'removeFollower' => 'refresh'];

    public $userId;

    public function getCountProperty()
    {
        
         $user = User::find($this->userId);
        return $user->pendingCount();
    }

    public function render()
    {
        return view('livewire.request-count');
    }
}
