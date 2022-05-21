<?php

declare(strict_types=1);

namespace App\Http\Requests\Api\V1\Transactions;

use Domain\Shared\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class CreditPackageActivationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        if (User::hasUnPaidCreditPackages($this->user->id)) {
            throw ValidationException::withMessages([
                'user' => [
                    'You have un-paid credit packages. Please pay them first.'
                ]
            ]);
        }

        return [];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'user' => $this->user,
            'creditPackage' => $this->creditPackage,
        ]);
    }
}
