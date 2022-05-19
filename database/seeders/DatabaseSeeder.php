<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        if (app()->environment('local')) {
            $this->call([
                CreditPackegeSeeder::class,
                ProductSeeder::class,
                UserSeeder::class
            ]);
        }

        if (app()->environment('production')) {
            $this->call([]);
        }
    }
}
