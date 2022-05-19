<?php

declare(strict_types=1);

namespace Domain\Crediting\Models\Builders;

use Illuminate\Database\Eloquent\Builder;

class TransactionBuilder extends Builder
{
    public function isIncrement(bool $isIncrement = true): self
    {
        return $this->where('is_increment', $isIncrement);
    }
}
