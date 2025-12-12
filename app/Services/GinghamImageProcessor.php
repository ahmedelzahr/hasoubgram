<?php

namespace App\Services;
use App\Contracts\ImageProcessor;
class GinghamImageProcessor extends ImageProcessor
{
   
    public function editImage() {
         $this->finalImage->resize(  $this->finalImage->width(),  $this->finalImage->height())->brightness(20)->contrast(20)->colorize(0, -10, -10);
        return $this->finalImage;
    }
}
