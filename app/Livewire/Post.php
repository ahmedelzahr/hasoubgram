<?php

namespace App\Livewire;

use App\Models\Post as ModelsPost;
use Livewire\Component;

class Post extends Component
{


    public ModelsPost $post;

    public function render()
    {
        return view('livewire.post');
    }
}
