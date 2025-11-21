<?php

namespace App\Livewire;
use Livewire\Component;
use App\Models\Post;


class PostList extends Component

{
    protected $listeners = ['confirmUser'=>'loadPosts' ,'removeFollower'=>'loadPosts','followEvent'=>'loadPosts' ];
    public $posts = [];

    public function mount()
    {
        $this->loadPosts();
    }

    public function loadPosts()
    {
        $ids = auth()->user()->following()->where('confirmed', 1)->pluck('users.id')->push(auth()->user()->id);
        $this->posts = Post::whereIn('user_id', $ids)->latest()->get();
    }

    public function render()
    {
        return view('livewire.post-list');
    }
}
