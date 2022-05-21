<?php

declare(strict_types=1);

namespace Domain\Crediting\Events;

use Domain\Crediting\Models\CreditPackage;
use Domain\Shared\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CreditPackageActivationEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $newUserWalletBalance;
    public $attributes;
    public $creditPackageId;

    public function __construct(
        public User $user,
        public CreditPackage $transactionable
    ) {
        $this->newUserWalletBalance = $user->wallet_balance + $transactionable->price;
        $this->attributes = ['payment_deadline_at' => now()->addDays($transactionable->payment_deadline_by_days)->toDateTime()];
        $this->creditPackageId = $transactionable->id;
    }


    public function broadcastOn(): Channel|array
    {
        return new PrivateChannel('channel-name');
    }
}
