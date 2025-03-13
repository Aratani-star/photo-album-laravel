<?php

namespace App\Domain\Image\Service;

use App\Domain\Image\Repositories\ImageRepository;
use App\Domain\Image\Interfaces\IImageService;
use Symfony\Component\HttpFoundation\File\UploadedFile;

final readonly class ImageService implements IImageService
{
    public function __construct(
        private ImageRepository $image_repository,
    ) {
    }

    public function save(UploadedFile $image): void {
        $path = $image->store('images', 'public'); // Store in the "images" folder
        $image_repository->create($path);
    }
}
