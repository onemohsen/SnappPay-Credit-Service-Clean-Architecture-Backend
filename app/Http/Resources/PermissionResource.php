<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PermissionResource extends JsonResource
{

    public function toArray($request): array
    {
        return [
            'name' => $this->name,
            'label' => $this->label,
        ];
    }
}
