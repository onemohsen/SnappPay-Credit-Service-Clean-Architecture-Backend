<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Users;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Domain\Shared\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Infrastructure\Http\Responses\ApiResponse;

class IndexController extends Controller
{
    public function __invoke(Request $request)
    {
        $users =  UserResource::collection(User::all());

        return ApiResponse::handle(
            data: [
                'message' => 'Users retrieved successfully',
                'data' => $users,
                'status' => Response::HTTP_OK,
            ],
            status: Response::HTTP_OK,
        );
    }
}
