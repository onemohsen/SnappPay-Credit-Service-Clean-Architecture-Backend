<?php

declare(strict_types=1);

namespace Domain\Crediting\Actions\Products;

use Domain\Crediting\Models\Product;
use Domain\Crediting\ValueObjects\ProductValueObject;

class UpdateProduct
{
    public static function handle(Product $Product, ProductValueObject $object): Product
    {
        $Product->update($object->toArray());
        $Product->refresh();
        return $Product;
    }
}
