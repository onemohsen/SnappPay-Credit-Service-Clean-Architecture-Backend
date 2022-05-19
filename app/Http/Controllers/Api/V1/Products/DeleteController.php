<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Products;

use App\Http\Controllers\Controller;
use Domain\Crediting\Actions\Products\DeleteProduct;
use Domain\Crediting\Models\Product;
use Illuminate\Http\Response;

class DeleteController extends Controller
{
    public function __invoke(Product $product)
    {
        DeleteProduct::handle($product);

        return response(
            ['message' => 'Product deleted successfully'],
            Response::HTTP_ACCEPTED
        );
    }
}
