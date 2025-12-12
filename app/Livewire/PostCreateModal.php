<?php

namespace App\Livewire;


use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;

class PostCreateModal extends ModalComponent
{
 
     use WithFileUploads;
 
 public $image;
 
  public static function modalMaxWidth(): string
{
    return '5xl';
}

public function save(){
    $this->validate([
        'image'=>'image|max:2024'
    ]);
    $temImage=$this->image->store('posts/temp','public');
    $this->dispatch('openModal','filter-modal', ['temImagePath'=>$temImage]);
}
    public function render()
    {
        return view('livewire.post-create-modal');
    }
}
