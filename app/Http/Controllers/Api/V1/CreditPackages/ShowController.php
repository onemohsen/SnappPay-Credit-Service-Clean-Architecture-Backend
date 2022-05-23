<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\CreditPackages;

use App\Http\Controllers\Controller;
use App\Http\Resources\CreditPackageResource;
use Domain\Crediting\Models\CreditPackage;
use Illuminate\Http\Response;
use Infrastructure\Http\Responses\ApiResponse;

class ShowController extends Controller
{
    public function __invoke(CreditPackage $creditPackage)
    {
        $this->authorize('show credit-package');

        return ApiResponse::handle(
            data: CreditPackageResource::make($creditPackage),
            message: __('messages.crud.read.success', ['label' => __('models.creditPackage')]),
            status: Response::HTTP_OK,
        );
    }
}
