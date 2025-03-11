<?php

namespace App\Domain\Image\ValueObjects;

use App\Utility\Facade\Equatable;
use InvalidArgumentException;

final readonly class ImageDescription
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

    public function __invoke(): string
    {
        return $this->value;
    }

    public function __set(string $name, string $value): void
    {
        $this->$value = $value;
    }
}
