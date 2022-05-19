<?php

namespace App\Http\Controllers\Api\V1\Users;

use App\Http\Controllers\Controller;
use Domain\Shared\Actions\Users\DeleteUser;
use Domain\Shared\Models\User;
use Illuminate\Http\Response;

class DeleteController extends Controller
{
    public function __invoke(User $user)
    {
        DeleteUser::handle($user);
        return response(null, Response::HTTP_ACCEPTED);
    }
}
