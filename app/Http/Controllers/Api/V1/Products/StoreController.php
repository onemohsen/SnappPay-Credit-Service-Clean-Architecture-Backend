<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Products\StoreRequest;
use App\Http\Resources\ProductResource;
use Domain\Crediting\Actions\Products\CreateProduct;
use Domain\Crediting\Factories\ProductFactory;
use Illuminate\Http\Response;
use Infrastructure\Http\Responses\ApiResponse;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $this->authorize('create product');

        $productObjectValue = ProductFactory::create($request->validated());
        $product = CreateProduct::handle($productObjectValue);

        return ApiResponse::handle(
            data: ProductResource::make($product),
            message: __('messages.crud.create.success', ['label' => __('models.product')]),
            status: Response::HTTP_ACCEPTED,
        );
    }
}
