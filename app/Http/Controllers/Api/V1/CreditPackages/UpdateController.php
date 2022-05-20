<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\CreditPackages;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\CreditPackages\UpdateRequest;
use App\Http\Resources\CreditPackageResource;
use Domain\Crediting\Actions\CreditPackages\UpdateCreditPackage;
use Domain\Crediting\Factories\CreditPackageFactory;
use Domain\Crediting\Models\CreditPackage;
use Illuminate\Http\Response;
use Infrastructure\Http\Responses\ApiResponse;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, CreditPackage $creditPackage)
    {
        $creditPackageValueObject = CreditPackageFactory::create($request->validated());
        $creditPackage = UpdateCreditPackage::handle($creditPackage, $creditPackageValueObject);

        return ApiResponse::handle(
            data: CreditPackageResource::make($creditPackage),
            message: __('messages.crud.update.success', ['label' => __('models.creditPackage')]),
            status: Response::HTTP_ACCEPTED,
        );
    }
}
