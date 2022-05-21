<?php

declare(strict_types=1);

namespace Domain\Shared\Actions\Users;

use Domain\Shared\Models\User;
use Domain\Shared\ValueObjects\CreditPackageUserPivotValueObject;

class AttachCreditPackageToUser
{
    public static function handle(User $user, CreditPackageUserPivotValueObject $object, int $creditPackageId)
    {
        return $user->creditPackages()->attach($creditPackageId, $object->toArray());
    }
}
