<?php

declare(strict_types=1);

namespace Domain\Shared\ValueObjects;

class UserValueObject
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
    ) {
    }

    public function toArray()
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
        ];
    }
}
