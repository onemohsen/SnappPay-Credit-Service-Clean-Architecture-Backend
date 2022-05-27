<?php

declare(strict_types=1);

namespace Domain\Shared\Actions\Users;

use Domain\Shared\ValueObjects\UserValueObject;
use Illuminate\Http\Request;

class LoginUser
{
    public static function handle(UserValueObject $object): array
    {
        $req =  Request::create(route('api.v1.passport.token'), 'post', [
            'grant_type' => config('snapppay.api.grant_type'),
            'client_id' => config('snapppay.api.client_id'),
            'client_secret' => config('snapppay.api.client_secret'),
            'username' => $object->email,
            'password' => $object->password,
        ]);

        $response = app()->handle($req);

        return json_decode($response->getContent(), true);
    }
}
