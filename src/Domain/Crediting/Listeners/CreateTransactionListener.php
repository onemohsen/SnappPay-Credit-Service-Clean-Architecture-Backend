<?php

declare(strict_types=1);

namespace Domain\Crediting\Listeners;

use Domain\Crediting\Actions\Transactions\CreateTransaction;
use Domain\Crediting\Factories\TransactionFactory;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateTransactionListener
{
    public function __construct()
    {
        //
    }

    public function handle(object $event): void
    {
        $transactionObjectValue = TransactionFactory::create($event->user, $event->transactionable);
        CreateTransaction::handle($transactionObjectValue);
    }
}
