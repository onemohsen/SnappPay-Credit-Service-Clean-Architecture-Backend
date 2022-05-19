<?php

declare(strict_types=1);

namespace App\Http\Requests\Api\V1\CreditPackages;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:255',
            ],
            'price' => [
                'required',
                'min:1',
                'numeric',
            ],
            'payment_deadline_by_days' => [
                'required',
                'numeric',
                'min:10',
                'max:365',
            ],
        ];
    }
}
