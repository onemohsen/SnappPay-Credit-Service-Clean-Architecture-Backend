<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Products;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use Domain\Crediting\Models\Product;
use Illuminate\Http\Response;
use Infrastructure\Http\Responses\ApiResponse;
use Spatie\QueryBuilder\QueryBuilder;

class IndexController extends Controller
{
    public function __invoke()
    {
        $this->authorize('show product');


        $products = QueryBuilder::for(Product::class)
            ->defaultSort('-id')
            ->paginate();

        return ApiResponse::handle(
            data: ProductResource::collection($products),
            message: __('messages.crud.read.success', ['label' => __('models.products')]),
            status: Response::HTTP_OK,
        );
    }
}
