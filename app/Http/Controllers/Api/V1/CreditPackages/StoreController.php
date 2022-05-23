<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\CreditPackages;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\CreditPackages\StoreRequest;
use App\Http\Resources\CreditPackageResource;
use Domain\Crediting\Actions\CreditPackages\CreateCreditPackage;
use Domain\Crediting\Factories\CreditPackageFactory;
use Illuminate\Http\Response;
use Infrastructure\Http\Responses\ApiResponse;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $this->authorize('create credit-package');

        $creditPackageValueObject = CreditPackageFactory::create($request->validated());
        $creditPackage = CreateCreditPackage::handle($creditPackageValueObject);

        return ApiResponse::handle(
            data: CreditPackageResource::make($creditPackage),
            message: __('messages.crud.create.success', ['label' => __('models.creditPackage')]),
            status: Response::HTTP_CREATED,
        );
    }
}
