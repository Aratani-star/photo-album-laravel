<?php

namespace App\Domain\Image\WorkFlows;

use App\Domain\Image\Models\Image;

class ImageWorkflow
{
    protected $image;

    public function __construct(Image $image)
    {
        $this->image = $image;
    }

    public function execute()
    {
        // Logic to execute the image processing workflow
        $this->image->processImage();
    }

    public function getImage(): Image
    {
        return $this->image;
    }

    public function setImage(Image $image): void
    {
        $this->image = $image;
    }
}
