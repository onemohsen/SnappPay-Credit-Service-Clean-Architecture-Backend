<?php

declare(strict_types=1);

namespace Domain\Shared\Actions\Users;

use Domain\Shared\Models\User;

class DeleteUser
{
    public static function handle(User $user): bool
    {
        return $user->delete();
    }
}
