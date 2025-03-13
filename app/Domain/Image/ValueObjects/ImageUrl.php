<?php

namespace App\Domain\Image\ValueObjects;

use App\Utility\Facade\Equatable;
use InvalidArgumentException;

final readonly class ImageUrl
{
    use Equatable;

    public function __construct(public string|null $value)
    {
        
    }

    protected function getValue(): string
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
