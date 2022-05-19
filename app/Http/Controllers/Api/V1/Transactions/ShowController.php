<?php

namespace App\Http\Controllers\Api\V1\Transactions;

use App\Http\Controllers\Controller;
use App\Http\Resources\TransactionResource;
use Domain\Crediting\Models\Transaction;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Domain\Crediting\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Transaction $transaction)
    {


        return TransactionResource::make($transaction);
    }
}
