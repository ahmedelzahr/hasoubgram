<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class Likedby extends Component
{

    protected $listeners=['toggledlike'=>'likes'];
    public Post $post;
    public function getLikesProperty(){
        return $this->post->likes()->count();
    }
public function getFirstusernameProperty(){
    return $this->post->likes()->first()->userName;
}

    public function render()
    {

       
        return view('livewire.likedby');
    }
}
