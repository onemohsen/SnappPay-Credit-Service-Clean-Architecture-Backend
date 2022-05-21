<?php

declare(strict_types=1);

namespace Domain\Crediting\ValueObjects;

class TransactionValueObject
{
    public function __construct(
        public int $old_user_wallet_balance,
        public int $price,
        public int $user_id,
        public int $transactionable_id,
        public string $transactionable_type,
    ) {
    }

    public function toArray()
    {
        return [
            ...$this->old_user_wallet_balance ? ['old_user_wallet_balance' => $this->old_user_wallet_balance] : [],
            ...$this->price ? ['price' => $this->price] : [],
            ...$this->user_id ? ['user_id' => $this->user_id] : [],
            ...$this->transactionable_id ? ['transactionable_id' => $this->transactionable_id] : [],
            ...$this->transactionable_type ? ['transactionable_type' => $this->transactionable_type] : [],
        ];
    }
}
