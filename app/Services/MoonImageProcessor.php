<?php

namespace App\Services;
use App\Contracts\ImageProcessor;
class MoonImageProcessor extends ImageProcessor
{
   
    public function editImage() {
         $this->finalImage->resize(  $this->finalImage->width(),  $this->finalImage->height())->brightness(10)->contrast(5)->greyscale();
        return $this->finalImage;
    }
}
