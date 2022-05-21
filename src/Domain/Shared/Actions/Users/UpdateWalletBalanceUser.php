<?php

declare(strict_types=1);

namespace Domain\Shared\Actions\Users;

use Domain\Shared\Models\User;

class UpdateWalletBalanceUser
{
    public static function handle(User $user, int $walletBalance)
    {
        $user->update(['wallet_balance' => $walletBalance]);
        $user->refresh();
        return $user;
    }
}
