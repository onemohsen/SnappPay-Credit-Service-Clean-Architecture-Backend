<?php

declare(strict_types=1);


namespace App\Http\Controllers\Api\V1\Users;

use Domain\Shared\Actions\Users\CreateUser;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Users\StoreRequest;
use App\Http\Resources\UserResource;
use Domain\Shared\Factories\UserFactory;
use Illuminate\Http\Response;
use Infrastructure\Http\Responses\ApiResponse;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $this->authorize('create user');

        $user = CreateUser::handle(
            UserFactory::create($request->validated())
        );

        return ApiResponse::handle(
            data: UserResource::make($user),
            message: __('messages.crud.create.success', ['label' => __('models.user')]),
            status: Response::HTTP_CREATED,
        );
    }
}
