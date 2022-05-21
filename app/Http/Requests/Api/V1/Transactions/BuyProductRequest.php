<?php

declare(strict_types=1);

namespace App\Http\Requests\Api\V1\Transactions;

use Illuminate\Foundation\Http\FormRequest;

class BuyProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'product.price' => 'required',
            'user.wallet_balance' => ['required', 'gte:product.price'],
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'user' => $this->user,
            'product' => $this->product,
        ]);
    }
}
