<?php

declare(strict_types=1);

namespace Domain\Shared\Actions\Users;

use Domain\Shared\Models\User;
use Domain\Shared\ValueObjects\UserValueObject;
use Illuminate\Support\Facades\Hash;

class CreateUser
{
    public static function handle(UserValueObject $object): User
    {
        return User::create(
            array_merge(
                $object->toArray(),
                ['password' => Hash::make($object->password)]
            )
        );
    }
}
