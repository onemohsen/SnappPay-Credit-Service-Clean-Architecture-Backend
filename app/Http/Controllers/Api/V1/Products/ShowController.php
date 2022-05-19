<?php

namespace App\Http\Controllers\Api\V1\Products;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use Domain\Crediting\Models\Product;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Domain\Crediting\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Product $product)
    {
        return ProductResource::make($product);
    }
}
