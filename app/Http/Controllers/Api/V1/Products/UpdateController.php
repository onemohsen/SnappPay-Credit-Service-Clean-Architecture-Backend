<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Products\UpdateRequest;
use App\Http\Resources\ProductResource;
use Domain\Crediting\Actions\Products\UpdateProduct;
use Domain\Crediting\Factories\ProductFactory;
use Domain\Crediting\Models\Product;
use Illuminate\Http\Response;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Product $product)
    {
        $productObjectValue = ProductFactory::create($request->validated());
        $product = UpdateProduct::handle($product, $productObjectValue);

        return response(
            [
                'message' => 'Product updated successfully',
                'data' => ProductResource::make($product)
            ],
            Response::HTTP_ACCEPTED
        );
    }
}
