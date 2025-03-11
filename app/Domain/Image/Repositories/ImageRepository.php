<?php

namespace App\Domains\Image\Repositories;

use App\Domains\Image\Interfaces\ImageRepositoryInterface;
use App\Domains\Image\Entities\Image;

class ImageRepository implements ImageRepositoryInterface
{
    public function create(array $data): Image
    {
        return Image::create($data);
    }

    public function findById(int $id): ?Image
    {
        return Image::find($id);
    }

    public function update(int $id, array $data): Image
    {
        $image = Image::find($id);
        $image->update($data);
        return $image;
    }

    public function delete(int $id): void
    {
        $image = Image::find($id);
        $image->delete();
    }

    public function getAllImages(): ?Image
    {
        return Image::findAll();
    }

    public function getImageByUserId(int $userId): ?Image
    {
        return Image::findByUserId($userId);
    }

    public function getImageByCategoryId(int $categoryId): ?Image
    {
        return Image::findByCategoryId($categoryId);
    }
}