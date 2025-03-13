<?php

namespace App\Domain\User\ValueObjects;

use App\Utility\Facade\Equatable;
use InvalidArgumentException;

final readonly class UserName
{
    use Equatable;

    public function __construct(public string|null $value)
    {
        if (empty($value)) {
            throw new InvalidArgumentException('氏名(名)が空です');
        } elseif (mb_strlen($value) > 10) {
            throw new InvalidArgumentException('氏名(名)は10文字以内で入力してください');
        }
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
