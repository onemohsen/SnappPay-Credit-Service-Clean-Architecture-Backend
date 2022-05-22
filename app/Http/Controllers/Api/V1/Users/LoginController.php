<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Users\LoginRequest;
use Domain\Shared\Actions\Users\LoginUser;
use Domain\Shared\Factories\UserFactory;
use Illuminate\Http\Response;
use Infrastructure\Http\Responses\ApiResponse;

class LoginController extends Controller
{
    public function __invoke(LoginRequest $request)
    {
        $token = LoginUser::handle(
            UserFactory::create($request->validated())
        );

        return ApiResponse::handle(
            data: $token,
            message: 'login success',
            status: Response::HTTP_ACCEPTED,
        );
    }
}
