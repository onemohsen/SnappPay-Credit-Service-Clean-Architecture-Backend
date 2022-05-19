<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Products;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use Domain\Crediting\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ShowController extends Controller
{
    public function __invoke(Request $request, Product $product)
    {
        return response()->json(
            ProductResource::make($product),
            Response::HTTP_OK
        );
    }
}
