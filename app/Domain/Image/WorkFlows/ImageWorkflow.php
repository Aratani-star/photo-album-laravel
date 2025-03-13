<?php

namespace App\Domain\Image\WorkFlows;

use Intervention\Image\Laravel\Facades\Image;
use Symfony\Component\HttpFoundation\File\UploadedFile;

use App\Domain\Image\Service\ImageService;

class ImageWorkflow
{
    protected $image;

    public function __construct(
        private ImageService $image_service,
    ) {
    }

    public function execute()
    {
        // Logic to execute the image processing workflow
        $this->image->processImage();
    }

    public function uploadImage(UploadedFile $image): void
    {
        // Store the image file
        $this->image_service->save($image);
    }
}
