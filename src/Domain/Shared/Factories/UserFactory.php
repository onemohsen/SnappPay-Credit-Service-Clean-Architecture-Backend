<?php

declare(strict_types=1);

namespace Domain\Shared\Factories;

use Domain\Shared\ValueObjects\UserValueObject;

class UserFactory
{
    public static function create(array $attributes): UserValueObject
    {
        return new UserValueObject(
            name: $attributes['name'],
            email: $attributes['email'],
            password: $attributes['password'],
        );
    }
}
