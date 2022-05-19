<?php



namespace App\Http\Controllers\Api\V1\Transactions;

use App\Http\Controllers\Controller;
use App\Http\Resources\TransactionResource;
use Domain\Crediting\Models\Transaction;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $transactions = Transaction::with([
            'user',
            'transactionable',
        ])->get();


        return TransactionResource::collection($transactions);
    }
}
