<?php

namespace App\Livewire;

use Livewire\Component;

class PostImage extends Component
{
    protected $listeners = ['editFile'=>'refresh'];
    public $image;
    public function render()
    {
        return view('livewire.post-image');
    }
}
