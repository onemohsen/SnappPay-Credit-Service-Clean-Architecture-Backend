<?php

declare(strict_types=1);

namespace Domain\Crediting\Factories;

use Domain\Crediting\ValueObjects\ProductValueObject;

class ProductFactory
{
    public static function create(array $attributes): ProductValueObject
    {
        return new ProductValueObject(
            name: $attributes['name'],
            price: (int) $attributes['price'],
        );
    }
}
