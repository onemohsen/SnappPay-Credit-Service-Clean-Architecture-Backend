<?php

declare(strict_types=1);

namespace Infrastructure\Http\Responses;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;

class ApiResponse
{

    private static array $headers = [
        'Content-Type' => 'application/json',
    ];


    public static function  handle($data = null, string $message = '', int $status = Response::HTTP_OK, array $headers = [])
    {
        /* condition for get paginate meta  */
        if ($data instanceof JsonResource) {
            $data = $data
                ->additional([
                    ...['status' => $status],
                    ...$message ? ['message' => $message] : []
                ])
                ->response() // get response
                ->getData(); // get paginat meta
        } else {
            $data = [
                ...$data ? ['data' => $data] : [],
                'status' => $status,
                ...$message ? ['message' => $message] : []
            ];
        }

        return new JsonResponse(
            data: $data,
            status: $status,
            headers: [...$headers, ...self::$headers],
        );
    }
}
