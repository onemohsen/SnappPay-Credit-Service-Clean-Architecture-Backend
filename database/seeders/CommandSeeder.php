<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class CommandSeeder extends Seeder
{
    public function run(): void
    {
        Artisan::call('passport:install');
        echo Artisan::output();



        /*TODO: Check In Production*/

        $client1 = DB::table('oauth_clients')->where('id', 1)
            ->update(['secret' => 'u5q50RT9ceJJNJTqqMyjw7IrbGVvwZq6AAoPBWsr']);
        $client2 = DB::table('oauth_clients')->where('id', 2)
            ->update(['secret' => 'L8erqTADUWRjv8TsAVWjlkSn2abyIekuK6mcgJV2']);


        $accessToken = DB::table('oauth_access_tokens')->insert([
            'id' => 'b45b1604547bd13cd5fda0b12b7e2a41f4fd8fbddf657e4ed783eca97d130688cdae42e5d8632772',
            'user_id' => 1,
            'client_id' => 2,
            'revoked' => 0
        ]);
    }
}
