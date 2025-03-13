<?php

namespace App\Domain\Image\Entities;

final readonly class Images
{
    /**
    * @param array<Image> $items
    */
    public function __construct(private array $items = [])
    {
        
    }

    /**
     * @return array<Image>
     */
    public function getImages(): array
    {
        return $this->items;
    }
}
