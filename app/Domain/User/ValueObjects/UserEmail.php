<?php

namespace App\Domain\User\ValueObjects;

use App\Utility\Facade\Equatable;

final readonly class UserEmail
{
    use Equatable;

    public function __construct(
        public string $value
    ) {
        // TODO: add guard clauses here
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
