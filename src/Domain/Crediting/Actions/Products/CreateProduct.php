<?php

declare(strict_types=1);

namespace Domain\Crediting\Actions\Products;

use Domain\Crediting\Models\Product;
use Domain\Crediting\ValueObjects\ProductValueObject;

class CreateProduct
{
    public static function handle(ProductValueObject $object): Product
    {
        return Product::create($object->toArray());
    }
}
