<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class Like extends Component
{

    public Post $post;

 public function toggleLike()
    {
        $this->post->likes()->toggle(auth()->user());

      $this->dispatch('toggledlike');

    }
    public function render()
    {
        return view('livewire.like');
    }
}
