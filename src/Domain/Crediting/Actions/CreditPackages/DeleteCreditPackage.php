<?php

declare(strict_types=1);

namespace Domain\Crediting\Actions\CreditPackages;

use Domain\Crediting\Models\CreditPackage;

class DeleteCreditPackage
{
    public static function handle(CreditPackage $CreditPackage): bool
    {
        return $CreditPackage->delete();
    }
}
