<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Products\StoreRequest;
use App\Http\Resources\ProductResource;
use Domain\Crediting\Actions\Products\CreateProduct;
use Domain\Crediting\Factories\ProductFactory;
use Illuminate\Http\Response;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $productObjectValue = ProductFactory::create($request->validated());
        $product = CreateProduct::handle($productObjectValue);

        return response(
            [
                'message' => 'Product Stored successfully',
                'data' => ProductResource::make($product)
            ],
            Response::HTTP_ACCEPTED
        );
    }
}
