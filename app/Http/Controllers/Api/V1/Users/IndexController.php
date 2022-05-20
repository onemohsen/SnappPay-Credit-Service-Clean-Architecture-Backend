<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Users;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Domain\Shared\Models\User;
use Illuminate\Http\Response;
use Infrastructure\Http\Responses\ApiResponse;

class IndexController extends Controller
{
    public function __invoke()
    {
        return ApiResponse::handle(
            data: UserResource::collection(User::all()),
            message: __('messages.crud.read.success', ['label' => __('models.users')]),
            status: Response::HTTP_OK,
        );
    }
}
