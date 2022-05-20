<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\CreditPackages;

use App\Http\Controllers\Controller;
use Domain\Crediting\Actions\CreditPackages\DeleteCreditPackage;
use Domain\Crediting\Models\CreditPackage;
use Illuminate\Http\Response;
use Infrastructure\Http\Responses\ApiResponse;

class DeleteController extends Controller
{
    public function __invoke(CreditPackage $creditPackage)
    {
        DeleteCreditPackage::handle($creditPackage);

        return ApiResponse::handle(
            message: __('messages.crud.delete.success', ['label' => __('models.creditPackage')]),
            status: Response::HTTP_ACCEPTED,
        );
    }
}
