<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;
use Symfony\Component\HttpKernel\HttpCache\Store;

class EditImageModal extends ModalComponent
{
    use WithFileUploads;

    public $postId;

    public $newImage;

    public $image;

    public $description;

    protected $post;

    public function mount()
    {
        $this->post = Post::find($this->postId);
        $this->newImage = null;
        $this->description = $this->post->description;
        $this->image = $this->post->image;
    }
   public static function modalMaxWidth(): string
    {
        return '5xl';
    }
    public function update()
    {
        
        $post = Post::find($this->postId);
        if(!$post){
            session()->flash('error','post not found');
            return;
        }
        $data = $this->validate(['newImage' => 'nullable|image|max:10240',
            'description' => 'required']);
        if(empty($this->description)){
            $errorMessage=__('description empty');
            session()->flash('error',$errorMessage);
             return redirect(route('show_post',$post->slug ));
        }
        if($this->newImage){
              Storage::delete('public/',$this->image);
            $data['image'] = $this->newImage->store('posts', 'public');
        }
      
        $post->update($data);
      
        $this->dispatch('editFile');
        $this->forceClose()->closeModal();
        return redirect(route('show_post',$post->slug ));

    }

    public function render()
    {
        return view('livewire.edit-image-modal');
    }
}
