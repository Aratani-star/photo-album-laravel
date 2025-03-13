<?php

namespace App\Domain\Image\Interfaces;

use App\Domains\Image\Model\Image;

interface IImageRepository
{
    public function create(string $path): void;
}
