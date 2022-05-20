<?php

declare(strict_types=1);

namespace Domain\Crediting\ValueObjects;

class ProductValueObject
{
    public function __construct(
        public string $name,
        public int $price,
    ) {
    }

    public function toArray()
    {
        return [
            ...$this->name ? ['name' => $this->name] : [],
            ...$this->price ? ['price' => $this->price] : [],
        ];
    }
}
