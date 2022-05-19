<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Products;

use App\Http\Controllers\Controller;
use Domain\Crediting\Actions\Products\DeleteProduct;
use Domain\Crediting\Models\Product;
use Illuminate\Http\Response;
use Infrastructure\Http\Responses\ApiResponse;

class DeleteController extends Controller
{
    public function __invoke(Product $product)
    {
        DeleteProduct::handle($product);

        return ApiResponse::handle(
            data: [
                'message' => 'Product deleted successfully',
                'status' => Response::HTTP_ACCEPTED,
            ],
            status: Response::HTTP_ACCEPTED,
        );
    }
}
