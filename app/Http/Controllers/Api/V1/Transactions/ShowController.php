<?php

namespace App\Http\Controllers\Api\V1\Transactions;

use App\Http\Controllers\Controller;
use App\Http\Resources\TransactionResource;
use Domain\Crediting\Models\Transaction;
use Illuminate\Http\Response;
use Infrastructure\Http\Responses\ApiResponse;

class ShowController extends Controller
{
    public function __invoke(Transaction $transaction)
    {
        $this->authorize('show transaction');

        $transaction->load([
            'user',
            'transactionable',
        ]);

        return ApiResponse::handle(
            data: TransactionResource::make($transaction),
            message: __('messages.crud.read.success', ['label' => __('models.transaction')]),
            status: Response::HTTP_OK,
        );
    }
}
