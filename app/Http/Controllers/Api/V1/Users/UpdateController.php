<?php

namespace App\Http\Controllers\Api\V1\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Users\UpdateRequest;
use App\Http\Resources\UserResource;
use Domain\Shared\Actions\Users\UpdateUser;
use Domain\Shared\Factories\UserFactory;
use Domain\Shared\Models\User;
use Illuminate\Http\Response;
use Infrastructure\Http\Responses\ApiResponse;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, User $user)
    {
        $userValueObject = UserFactory::create($request->validated());
        $user = UpdateUser::handle($user, $userValueObject);

        return ApiResponse::handle(
            data: UserResource::make($user),
            message: __('messages.crud.update.success', ['label' => __('models.user')]),
            status: Response::HTTP_ACCEPTED,
        );
    }
}
