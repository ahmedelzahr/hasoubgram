<?php

namespace App\Livewire;

use App\Contracts\ImageProcessor;
use App\Models\Post;
use App\Services\ClarendonImageProcessor;
use App\Services\GinghamImageProcessor;
use App\Services\MoonImageProcessor;
use App\Services\OriginalImageProcessor;
use App\Services\PerpetuaImageProcessor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;

class FilterModal extends ModalComponent
{
    use WithFileUploads;
    public $filters = [];
    public $temImagePath;
    public $processedImageName;
    public $processedImagePath;
    public $finalImagePath;
    public $description;
    private ImageProcessor $selectedProcessClass;
    public function mount()
    {
        $this->filters = ['Original' => OriginalImageProcessor::class, 'Clarendon' => ClarendonImageProcessor::class, 'Moon' => MoonImageProcessor::class ,'Gingham'=>GinghamImageProcessor::class, 'Perpetua'=>PerpetuaImageProcessor::class ];
        $this->selectedProcessClass = new $this->filters['Original']('storage/'.$this->temImagePath);
        $this->processImage('Original');
    }

    public static function modalMaxWidth(): string
    {
        return '5xl';
    }

    public function processImage($selectedFilter)
    {
        $this->selectedProcessClass = new $this->filters[$selectedFilter]('storage/'.$this->temImagePath);
        $this->processedImageName = $this->selectedProcessClass->getProcessedImage();
        $this->processedImagePath = 'posts/temp/'.$this->processedImageName;
    }

    public function save()
    {
        $data = $this->validate(['description' => 'required']);
        $this->finalImagePath = 'posts/'.$this->processedImageName;
        Storage::disk('public')->move('posts/temp/'.$this->processedImageName, $this->finalImagePath);
        $data['image'] = $this->finalImagePath;
        $data['slug'] = Str::random(10);
        $data['user_id'] = Auth::id();
        Post::create($data);
        Storage::disk('public')->deleteDirectory('posts/temp');
        $this->dispatch('addPost');
        $this->forceClose()->closeModal();
    }

    public function render()
    {
        return view('livewire.filter-modal');
    }
}
