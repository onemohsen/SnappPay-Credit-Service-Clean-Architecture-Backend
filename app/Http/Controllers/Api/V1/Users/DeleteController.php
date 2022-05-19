<?php

namespace App\Http\Controllers\Api\V1\Users;

use App\Http\Controllers\Controller;
use Domain\Shared\Actions\Users\DeleteUser;
use Domain\Shared\Models\User;
use Illuminate\Http\Response;
use Infrastructure\Http\Responses\ApiResponse;

class DeleteController extends Controller
{
    public function __invoke(User $user)
    {
        DeleteUser::handle($user);

        return ApiResponse::handle(
            data: [
                'message' => 'User deleted successfully',
                'status' => Response::HTTP_ACCEPTED,
            ],
            status: Response::HTTP_ACCEPTED,
        );
    }
}
