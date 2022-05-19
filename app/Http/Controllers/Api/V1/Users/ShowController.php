<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Users;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Domain\Shared\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Infrastructure\Http\Responses\ApiResponse;

class ShowController extends Controller
{

    public function __invoke(Request $request, User $user)
    {
        $user = UserResource::make($user);

        return ApiResponse::handle(
            data: [
                'message' => 'User retrieved successfully',
                'data' => $user,
                'status' => Response::HTTP_OK,
            ],
            status: Response::HTTP_OK,
        );
    }
}
