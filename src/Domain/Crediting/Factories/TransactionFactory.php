<?php

declare(strict_types=1);

namespace Domain\Crediting\Factories;

use Domain\Crediting\Models\CreditPackage;
use Domain\Crediting\Models\Product;
use Domain\Crediting\ValueObjects\TransactionValueObject;
use Domain\Shared\Models\User;

class TransactionFactory
{
    public static function create(User $user, Product|CreditPackage $transactioanble): TransactionValueObject
    {
        return new TransactionValueObject(
            old_user_wallet_balance: $user->wallet_balance,
            price: $transactioanble->price,
            user_id: $user->id,
            transactionable_id: $transactioanble->id,
            transactionable_type: get_class($transactioanble),
        );
    }
}
