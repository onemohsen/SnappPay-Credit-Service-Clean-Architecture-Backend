<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Domain\Crediting\Models\CreditPackage;
use Domain\Crediting\Models\Product;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'old_user_wallet_balance' => $this->old_user_wallet_balance,
            'price' => $this->price,
            'new_user_wallet_balance' => $this->new_user_wallet_balance,
            'is_increment' => $this->is_increment,
            'type' => $this->transactionable_type === Product::class ? 'product' : 'creditPackage',
            'user' => new UserResource($this->whenLoaded('user')),
            'transactionable' => $this->when($this->relationLoaded('transactionable'), function () {
                if ($this->transactionable instanceof Product) {
                    return new ProductResource($this->transactionable);
                }
                if ($this->transactionable instanceof CreditPackage) {
                    return new CreditPackageResource($this->transactionable);
                }
                return null;
            }),
            'links' => [
                'self' => route('api.v1.transactions.show', $this->id),
                'parent' => route('api.v1.transactions.index'),
            ],
        ];
    }
}
