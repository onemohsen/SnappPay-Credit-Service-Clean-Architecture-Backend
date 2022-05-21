<?php

declare(strict_types=1);

namespace Domain\Crediting\Listeners;

use Domain\Shared\Actions\Users\UpdateWalletBalanceUser;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateWalletBalanceUserListener
{
    public function __construct()
    {
        //
    }

    public function handle(object $event): void
    {
        UpdateWalletBalanceUser::handle($event->user, $event->newUserWalletBalance);
    }
}
