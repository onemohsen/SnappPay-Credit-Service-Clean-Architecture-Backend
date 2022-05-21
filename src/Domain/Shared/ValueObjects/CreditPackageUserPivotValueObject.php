<?php

declare(strict_types=1);

namespace Domain\Shared\ValueObjects;

use DateTime;

class CreditPackageUserPivotValueObject
{
    public function __construct(
        public DateTime $payment_deadline_at,
        public bool|null $is_paid,
        public DateTime|null $paid_at = null,
    ) {
    }

    public function toArray()
    {
        return [
            ...$this->payment_deadline_at ? ['payment_deadline_at' => $this->payment_deadline_at] : [],
            ...$this->is_paid ? ['is_paid' => $this->is_paid] : [],
            ...$this->paid_at ? ['paid_at' => $this->paid_at] : [],
        ];
    }
}
