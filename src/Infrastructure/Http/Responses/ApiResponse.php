<?php

declare(strict_types=1);

namespace Infrastructure\Http\Responses;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class ApiResponse
{

    private static array $headers = [
        'Content-Type' => 'application/json',
    ];

    public static function  handle(array $data, null|int $status = null, array $headers = []): JsonResponse
    {
        return new JsonResponse(
            data: [
                ...isset($data['message']) ? ['message' => $data['message']] : [],
                ...$status ? ['status' => $status] : Response::HTTP_OK,
                ...isset($data['data']) ? ['data' => $data['data']] : [],
            ],
            status: $status ?? Response::HTTP_OK,
            headers: [...$headers, ...self::$headers],
        );
    }
}
