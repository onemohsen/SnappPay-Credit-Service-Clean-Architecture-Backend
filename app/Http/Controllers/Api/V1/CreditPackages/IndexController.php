<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\CreditPackages;

use App\Http\Controllers\Controller;
use App\Http\Resources\CreditPackageResource;
use Domain\Crediting\Models\CreditPackage;
use Illuminate\Http\Response;
use Infrastructure\Http\Responses\ApiResponse;
use Spatie\QueryBuilder\QueryBuilder;

class IndexController extends Controller
{
    public function __invoke()
    {
        $this->authorize('show credit-package');

        $creditPackages = QueryBuilder::for(CreditPackage::class)
            ->defaultSort('-id')
            ->paginate();

        return ApiResponse::handle(
            data: CreditPackageResource::collection($creditPackages),
            message: __('messages.crud.read.success', ['label' => __('models.creditPackages')]),
            status: Response::HTTP_OK,
        );
    }
}
