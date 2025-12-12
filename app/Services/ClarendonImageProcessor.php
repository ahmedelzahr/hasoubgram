<?php

namespace App\Services;
use App\Contracts\ImageProcessor;
class ClarendonImageProcessor extends ImageProcessor
{
   
    public function editImage() {
         $this->finalImage->resize(  $this->finalImage->width(),  $this->finalImage->height())->brightness(20)->contrast(15);
        return $this->finalImage;
    }
}
