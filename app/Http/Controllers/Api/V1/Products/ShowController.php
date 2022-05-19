<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Products;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use Domain\Crediting\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Infrastructure\Http\Responses\ApiResponse;

class ShowController extends Controller
{
    public function __invoke(Request $request, Product $product)
    {
        $product = ProductResource::make($product);

        return ApiResponse::handle(
            data: [
                'message' => 'Product retrieved successfully',
                'data' => $product,
                'status' => Response::HTTP_OK,
            ],
            status: Response::HTTP_OK,
        );
    }
}
