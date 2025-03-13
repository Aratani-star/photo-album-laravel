<?php

namespace App\Domain\Staff\ValueObjects;

use Illuminate\Support\Facades\Hash;
use InvalidArgumentException;

final readonly class UserPassword
{
    private const ALLOWED_SYMBOL = '\'-!"#$%&()*,./:;?@[]^_`{|}~+<=>';
    private const MIN_LENGTH = 6;
    private const MAX_LENGTH = 30;

    public function __construct(public string $value, public string $name = 'UserPassword')
    {
        if(!empty($value)){
            // 使用できない文字が含まれている場合
            if (preg_match('/[^0-9a-zA-Z' . preg_quote(self::ALLOWED_SYMBOL, '/') . ']/', $this->value)) {
                throw new InvalidArgumentException($name . 'に使用出来ない文字が使用されています。');
            }

            // 大文字、小文字、数字、記号をそれぞれ1文字以上含む
            if (
                !preg_match('/[A-Z]/', $this->value)
                || !preg_match('/[a-z]/', $this->value)
                || !preg_match('/[0-9]/', $this->value)
                || !preg_match('/[' . preg_quote(self::ALLOWED_SYMBOL, '/') . ']/', $this->value)
            ) {
                throw new InvalidArgumentException($name . 'は大文字、小文字、数字、記号をそれぞれ1文字以上含めてください。');
            }

            // 文字数が指定範囲外の場合
            if (mb_strlen($this->value) < self::MIN_LENGTH || mb_strlen($this->value) > self::MAX_LENGTH) {
                throw new InvalidArgumentException($name . 'パスワードは' . self::MIN_LENGTH . '文字以上' . self::MAX_LENGTH . '文字以下で設定してください。');
            }
        }
    }

    public function hash(): HashedPassword
    {
        $value = Hash::make($this->value);
        return new HashedPassword($value);
    }
}
