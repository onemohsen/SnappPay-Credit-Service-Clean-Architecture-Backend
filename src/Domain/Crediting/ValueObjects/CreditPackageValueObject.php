<?php

declare(strict_types=1);

namespace Domain\Crediting\ValueObjects;

class CreditPackageValueObject
{
    public function __construct(
        public string $name,
        public int $price,
        public int $payment_deadline_by_days,
    ) {
    }

    public function toArray()
    {
        return [
            ...$this->name ? ['name' => $this->name] : [],
            ...$this->price ? ['price' => $this->price] : [],
            ...$this->payment_deadline_by_days ? ['payment_deadline_by_days' => $this->payment_deadline_by_days] : [],
        ];
    }
}
