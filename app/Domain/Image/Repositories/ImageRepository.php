<?php

namespace App\Domain\Image\Repositories;

use App\Domain\Image\Interfaces\IImageRepository;
// use App\Domains\Image\Entities\Image;
use App\Domain\Model\Image;

class ImageRepository implements IImageRepository
{
    public function create(string $path): void
    {
        $image = new Image();
        $image->url = $path;
        $image->name = "Upload";
        $image->description = "Uploaded Image";
        $image->save();
    }
}