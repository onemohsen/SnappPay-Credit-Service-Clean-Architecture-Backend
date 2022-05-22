<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Users;

use App\Http\Controllers\Controller;
use Domain\Shared\Actions\Users\LogoutUser;
use Illuminate\Http\Response;
use Infrastructure\Http\Responses\ApiResponse;

class LogoutController extends Controller
{
    public function __invoke()
    {
        $successLogout = LogoutUser::handle();

        if (!$successLogout) {
            return ApiResponse::handle(
                message: 'logout failed',
                status: Response::HTTP_UNAUTHORIZED,
            );
        }

        return ApiResponse::handle(
            message: 'logout success',
            status: Response::HTTP_ACCEPTED,
        );
    }
}
