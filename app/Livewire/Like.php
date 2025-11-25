<?php

namespace App\Livewire;

use App\Models\Post;
use App\Notifications\LikeNotification;
use Livewire\Component;

class Like extends Component
{
    public Post $post;

    public function toggleLike()
    {
        $result = $this->post->likes()->toggle(auth()->user());
        
        if ($result['attached']!=null && $this->post->owner != auth()->user()) {
            $this->post->owner->notify(new LikeNotification(auth()->user(), $this->post));
        }

        $this->dispatch('toggledlike');

    }

    public function render()
    {
        return view('livewire.like');
    }
}
