<?php

namespace App\Http\Controllers\Api\V1\Users;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Http\Response;
use Infrastructure\Http\Responses\ApiResponse;

class CurrentController extends Controller
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

        $user['permissions'] = $user->getAllPermissions();

        return ApiResponse::handle(
            data: UserResource::make($user),
            message: __('messages.crud.read.success', ['label' => __('models.user')]),
            status: Response::HTTP_ACCEPTED,
        );
    }
}
