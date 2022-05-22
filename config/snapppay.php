<?php

return [

    /*
    |
    | General Settings
    |
    */

    'general' => [
        'paginate' => [
            'limit' => 10,
        ],
    ],

    'api' => [
        'grant_type' => env('SNAPPPAY_GRANT_TYPE') ?? 'password',
        'client_id' => env('SNAPPPAY_CLIENT_ID') ?? '2',
        'client_secret' => env('SNAPPPAY_CLIENT_SECRET') ?? 'L8erqTADUWRjv8TsAVWjlkSn2abyIekuK6mcgJV2',
    ],
];
