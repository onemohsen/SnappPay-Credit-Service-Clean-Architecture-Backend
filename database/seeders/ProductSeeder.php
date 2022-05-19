<?php

declare(strict_types=1);


namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        \Domain\Crediting\Models\Product::factory(5)->create();
    }
}
