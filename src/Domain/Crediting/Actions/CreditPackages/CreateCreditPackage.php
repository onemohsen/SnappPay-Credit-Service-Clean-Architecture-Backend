<?php

declare(strict_types=1);

namespace Domain\Crediting\Actions\CreditPackages;

use Domain\Crediting\Models\CreditPackage;
use Domain\Crediting\ValueObjects\CreditPackageValueObject;

class CreateCreditPackage
{
    public static function handle(CreditPackageValueObject $object): CreditPackage
    {
        return CreditPackage::create($object->toArray());
    }
}
