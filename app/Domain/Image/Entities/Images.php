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

    public function filter(callable $callback): self
    {
        return new self(array_filter($this->items, $callback));
    }

    public function map(callable $callback): array
    {
        return array_map($callback, $this->items);
    }

    public function reduce(callable $callback, mixed $initial = null): mixed
    {
        return array_reduce($this->items, $callback, $initial);
    }

    public function add(Image $image): self
    {
        $this->items[] = $image;
        return new self($this->items);
    }

    public function remove(Image $image): self
    {
        $this->items = array_filter($this->items, fn($item) => $item !== $image);
    }
    
}
