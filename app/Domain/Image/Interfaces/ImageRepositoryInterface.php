<?php

namespace App\Domains\Image\Interfaces;

use App\Domains\Image\Models\Image;

interface ImageRepositoryInterface
{
    public function create(array $data): Image;
    public function findById(int $id): ?Image;
    public function update(int $id, array $data): Image;
    public function delete(int $id): void;
    public function getAllImages(): ?Image;
}
