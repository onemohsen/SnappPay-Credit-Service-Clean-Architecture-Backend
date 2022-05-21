<?php

declare(strict_types=1);

namespace Domain\Crediting\Actions\Transactions;

use Domain\Crediting\Models\CreditPackage;
use Domain\Crediting\Models\Product;
use Domain\Crediting\Models\Transaction;
use Domain\Crediting\ValueObjects\TransactionValueObject;

class CreateTransaction
{
    public static function handle(TransactionValueObject $object): Transaction
    {
        $data = [];

        if ($object->transactionable_type === Product::class) {
            $data = [
                'is_increment' => false,
                'new_user_wallet_balance' => $object->old_user_wallet_balance - $object->price,
            ];
        }

        if ($object->transactionable_type === CreditPackage::class) {
            $data = [
                'is_increment' => true,
                'new_user_wallet_balance' => $object->old_user_wallet_balance + $object->price,
            ];
        }

        return Transaction::create([...$object->toArray(), ...$data]);
    }
}
