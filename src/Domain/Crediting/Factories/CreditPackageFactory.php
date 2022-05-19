<?php

declare(strict_types=1);

namespace Domain\Crediting\Factories;

use Domain\Crediting\ValueObjects\CreditPackageValueObject;

class CreditPackageFactory
{
    public static function create(array $attributes): CreditPackageValueObject
    {
        return new CreditPackageValueObject(
            name: $attributes['name'],
            price: (int) $attributes['price'],
            payment_deadline_by_days: (int) $attributes['payment_deadline_by_days'],
        );
    }
}
