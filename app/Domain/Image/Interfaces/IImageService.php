<?php

namespace App\Domain\Image\Interfaces;
use Symfony\Component\HttpFoundation\File\UploadedFile;

interface IImageService
{
    public function save(UploadedFile $path): void;
}
