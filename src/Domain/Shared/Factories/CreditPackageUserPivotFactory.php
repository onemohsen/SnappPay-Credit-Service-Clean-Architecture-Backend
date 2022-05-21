<?php

declare(strict_types=1);

namespace Domain\Shared\Factories;

use Domain\Shared\ValueObjects\CreditPackageUserPivotValueObject;

class CreditPackageUserPivotFactory
{
    public static function create(array $attributes): CreditPackageUserPivotValueObject
    {
        return new CreditPackageUserPivotValueObject(
            payment_deadline_at: $attributes['payment_deadline_at'],
            is_paid: $attributes['is_paid'] ?? null,
            paid_at: $attributes['paid_at'] ?? null
        );
    }
}
