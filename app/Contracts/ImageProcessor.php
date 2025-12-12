<?php
namespace App\Contracts;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;
abstract class ImageProcessor{
     protected $finalImage;
     private $processedImageName;
     public function __construct(public $initialimage)
    {
       $this->finalImage=Image::read($this->initialimage);
    }
    
   abstract public function editImage();
   
    public function getProcessedImage(){
        $this->processedImageName=Str::random(30).'.jpeg';
        $processedImagePath='posts/temp/'.  $this->processedImageName;
        $this->editImage()->save( storage_path('app/public/'.$processedImagePath));
        return  $this->processedImageName;
    }

    

}