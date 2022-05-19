<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'name' => $this->name,
            'price' => $this->price,
            'transactions' => TransactionResource::collection($this->whenLoaded('transactions')),
            'links' => [
                'self' => route('api.v1.products.show', $this->id),
                'parent' => route('api.v1.products.index'),
            ],
        ];
    }
}
