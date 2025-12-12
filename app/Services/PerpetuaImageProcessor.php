<?php

namespace App\Services;

use App\Contracts\ImageProcessor;
class PerpetuaImageProcessor extends ImageProcessor
{
   
    public function editImage() {
            $this->finalImage->resize(  $this->finalImage->width(),  $this->finalImage->height())->contrast(-10)->colorize(-10, 10, 10);
        return $this->finalImage;
    }
}
