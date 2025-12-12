<?php

namespace App\Services;

use App\Contracts\ImageProcessor;
class OriginalImageProcessor extends ImageProcessor
{
   
    public function editImage() {
         $this->finalImage->resize(  $this->finalImage->width(),  $this->finalImage->height());
        return $this->finalImage;
    }
}
