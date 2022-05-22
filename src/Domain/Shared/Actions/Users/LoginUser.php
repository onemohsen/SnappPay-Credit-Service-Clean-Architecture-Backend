<?php

declare(strict_types=1);

namespace Domain\Shared\Actions\Users;

use Domain\Shared\ValueObjects\UserValueObject;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;

class LoginUser
{
    public static function handle(UserValueObject $object): array
    {
        try {
            $response = Http::post(route('api.v1.passport.token'), [
                'grant_type' => config('snapppay.api.grant_type'),
                'client_id' => config('snapppay.api.client_id'),
                'client_secret' => config('snapppay.api.client_secret'),
                'username' => $object->email,
                'password' => $object->password,
            ]);
        } catch (\GuzzleHttp\Exception\BadResponseException $e) {
            if ($e->getCode() == 400) abort(Response::HTTP_UNAUTHORIZED, 'Invalid Request');
            if ($e->getCode() == 401) abort(Response::HTTP_UNAUTHORIZED, 'Invalid Credentials');
        } catch (\Exception $e) {
            abort(Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return $response->json();
    }
}
