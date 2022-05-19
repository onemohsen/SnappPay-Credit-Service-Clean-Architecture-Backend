<?php

declare(strict_types=1);

namespace Domain\Shared\Actions\Users;

use Domain\Shared\Models\User;
use Domain\Shared\ValueObjects\UserValueObject;
use Illuminate\Support\Facades\Hash;

class UpdateUser
{
    public static function handle(User $user, UserValueObject $object): User
    {
        $password = $object->password ? ['password' => Hash::make($object->password)] : [];
        $user->update([...$object->toArray(), ...$password]);
        $user->refresh();

        return $user;
    }
}
