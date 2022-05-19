<?php

declare(strict_types=1);

namespace Domain\Crediting\Actions\CreditPackages;

use Domain\Crediting\Models\CreditPackage;
use Domain\Crediting\ValueObjects\CreditPackageValueObject;

class UpdateCreditPackage
{
    public static function handle(CreditPackage $creditPackage, CreditPackageValueObject $object): CreditPackage
    {
        $creditPackage->update($object->toArray());
        $creditPackage->refresh();
        return $creditPackage;
    }
}
