<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Products;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use Domain\Crediting\Models\Product;
use Illuminate\Http\Response;
use Infrastructure\Http\Responses\ApiResponse;

class ShowController extends Controller
{
    public function __invoke(Product $product)
    {
        return ApiResponse::handle(
            data: ProductResource::make($product),
            message: __('messages.crud.read.success', ['label' => __('models.product')]),
            status: Response::HTTP_OK,
        );
    }
}
