<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\CreditPackages;

use App\Http\Controllers\Controller;
use App\Http\Resources\CreditPackageResource;
use Domain\Crediting\Models\CreditPackage;
use Illuminate\Http\Response;
use Infrastructure\Http\Responses\ApiResponse;

class IndexController extends Controller
{
    public function __invoke()
    {
        $creditPackages = CreditPackage::all();

        return ApiResponse::handle(
            data: [
                'message' => __('messages.crud.read.success', ['label' => __('models.creditPackages')]),
                'data' => CreditPackageResource::collection($creditPackages),
                'status' => Response::HTTP_OK,
            ],
            status: Response::HTTP_OK,
        );
    }
}
