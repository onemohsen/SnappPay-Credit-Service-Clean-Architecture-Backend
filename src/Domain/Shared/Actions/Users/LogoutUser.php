<?php

declare(strict_types=1);

namespace Domain\Shared\Actions\Users;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;
use Infrastructure\Http\Responses\ApiResponse;

class LogoutUser
{
    public static function handle(): bool
    {
        $user = auth()->guard('api')->user();
        if (!$user) return false;
        $tokens = $user->tokens()->get();
        $tokens->each(fn ($item) => $item->delete());
        return true;
    }
}
