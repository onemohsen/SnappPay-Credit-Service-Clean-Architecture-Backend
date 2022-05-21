<?php

namespace App\Http\Controllers\Api\V1\Transactions;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Transactions\BuyProductRequest;
use Domain\Crediting\Events\BuyProductEvent;
use Domain\Crediting\Models\Product;
use Domain\Shared\Models\User;
use Illuminate\Http\Response;
use Infrastructure\Http\Responses\ApiResponse;

class BuyProductController extends Controller
{
    public function __invoke(BuyProductRequest $request, User $user, Product $product)
    {
        BuyProductEvent::dispatch($user, $product);

        return ApiResponse::handle(
            message: __('messages.crud.create.success', ['label' => __('models.transaction')]),
            status: Response::HTTP_CREATED,
        );
    }
}
