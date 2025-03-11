<?php

namespace App\Domain\User\Entities;

use App\Domain\Image\ValueObjects\ImageName;
use App\Domain\Image\ValueObjects\ImageUrl;
use App\Domain\Image\ValueObjects\ImageDescription;

final readonly class Image
{

    public function __construct(
        public ImageName $image_name,
        public ImageUrl $image_url,
        public ImageDescription $image_description,
        public ImageCreatedAt $image_created_at,
        public ImageUpdatedAt $image_updated_at,
    ) {
        // TODO: add guard clauses here
    }

    public function update(
        ImageName $image_name,
        ImageUrl $image_url,
        ImageDescription $image_description,
    ) {
        return new self(
            $this->id,
            $image_name,
            $image_url,
            $image_description,
        );
    }

    public function getId(): ImageId
    {
        return $this->id;
    }

    public function getName(): ImageName
    {
        return $this->image_name;
    }

    public function getUrl(): ImageUrl
    {
        return $this->image_url;
    }

    public function getDescription(): ImageDescription
    {
        return $this->image_description;
    }

}
