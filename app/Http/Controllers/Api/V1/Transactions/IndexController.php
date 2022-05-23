<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Transactions;

use App\Http\Controllers\Controller;
use App\Http\Resources\TransactionResource;
use Domain\Crediting\Models\Transaction;
use Illuminate\Http\Response;
use Infrastructure\Http\Responses\ApiResponse;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class IndexController extends Controller
{
    public function __invoke()
    {
        $this->authorize('show transaction');

        $transactions = QueryBuilder::for(Transaction::class)
            ->allowedFilters([
                AllowedFilter::exact('user_id'),
                AllowedFilter::scope('isIncrement'),
            ])
            ->allowedIncludes([
                'user',
                'transactionable',
            ])
            ->defaultSort('-id')
            ->paginate();

        return ApiResponse::handle(
            data: TransactionResource::collection($transactions),
            message: __('messages.crud.read.success', ['label' => __('models.transactions')]),
            status: Response::HTTP_OK,
        );
    }
}
