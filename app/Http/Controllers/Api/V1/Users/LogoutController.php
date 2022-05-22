<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Infrastructure\Http\Responses\ApiResponse;

class LogoutController extends Controller
{
    public function __invoke()
    {
        $user = auth()->guard('api')->user();
        if (!$user) {
            return ApiResponse::handle(
                message: 'not found',
                status: Response::HTTP_NOT_FOUND,
            );
        }

        $tokens = $user->tokens()->get();
        $tokens->each(fn ($item) => $item->delete());

        return ApiResponse::handle(
            message: 'logout success',
            status: Response::HTTP_ACCEPTED,
        );
    }
}
