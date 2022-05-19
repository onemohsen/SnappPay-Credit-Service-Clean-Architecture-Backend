<?php

declare(strict_types=1);

namespace Domain\Crediting\Actions\Products;

use Domain\Crediting\Models\Product;

class DeleteProduct
{
    public static function handle(Product $Product): bool
    {
        return $Product->delete();
    }
}
