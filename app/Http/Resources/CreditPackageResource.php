<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CreditPackageResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,
            'payment_deadline_by_days' => $this->payment_deadline_by_days,
            'transactions' => TransactionResource::collection($this->whenLoaded('transactions')),
            'links' => [
                'self' => route('api.v1.credit-packages.show', $this->id),
                'parent' => route('api.v1.credit-packages.index'),
            ],
        ];
    }
}
