<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Products;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use Domain\Crediting\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Infrastructure\Http\Responses\ApiResponse;

class IndexController extends Controller
{
    public function __invoke(Request $request)
    {
        $products = Product::all();

        return ApiResponse::handle(
            data: [
                'message' => 'Products retrieved successfully',
                'data' => ProductResource::collection($products),
                'status' => Response::HTTP_OK,
            ],
            status: Response::HTTP_OK,
        );
    }
}
