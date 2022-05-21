<?php

declare(strict_types=1);

namespace Domain\Crediting\Events;

use Domain\Crediting\Models\Product;
use Domain\Shared\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class BuyProductEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $newUserWalletBalance;

    public function __construct(
        public User $user,
        public Product $product
    ) {
        $this->newUserWalletBalance = $user->wallet_balance - $product->price;
    }

    public function broadcastOn(): Channel|array
    {
        return new PrivateChannel('channel-name');
    }
}
