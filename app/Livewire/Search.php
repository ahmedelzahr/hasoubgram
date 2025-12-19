<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Container\Attributes\Auth;
use Livewire\Component;

class Search extends Component
{

    public $keyWord='';
    
    public function clear(){
        $this->keyWord='';
    }

    public function goTo($user_name){
        return redirect(route('user_profile', $user_name));
    }
    public function render()
    {
        $users=User::where('userName','LIKE',"%{$this->keyWord}%")->get();
        return view('livewire.search' , compact('users') );
    }
}
