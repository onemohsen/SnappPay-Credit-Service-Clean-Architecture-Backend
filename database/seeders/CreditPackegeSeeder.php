<?php

declare(strict_types=1);


namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CreditPackegeSeeder extends Seeder
{
    public function run(): void
    {
        \Domain\Crediting\Models\CreditPackage::factory(5)->create();
    }
}
