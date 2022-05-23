<?php

namespace App\Http\Controllers\Api\V1\Transactions;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Transactions\CreditPackageActivationRequest;
use Domain\Crediting\Events\CreditPackageActivationEvent;
use Domain\Crediting\Models\CreditPackage;
use Domain\Shared\Models\User;
use Illuminate\Http\Response;
use Infrastructure\Http\Responses\ApiResponse;

class CreditPackageActivationController extends Controller
{
    public function __invoke(CreditPackageActivationRequest $request, User $user, CreditPackage $creditPackage)
    {
        CreditPackageActivationEvent::dispatch($user, $creditPackage);

        return ApiResponse::handle(
            message: __('messages.crud.create.success', ['label' => __('models.transaction')]),
            status: Response::HTTP_CREATED,
        );
    }
}
