<?php

declare(strict_types=1);


namespace App\Http\Controllers\Api\V1\Users;

use Domain\Shared\Actions\Users\CreateUser;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Users\StoreRequest;
use App\Http\Resources\UserResource;
use Domain\Shared\Factories\UserFactory;
use Illuminate\Http\Response;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $user = CreateUser::handle(
            UserFactory::create($request->validated())
        );

        return response()->json(UserResource::make($user), Response::HTTP_CREATED);
    }
}
