<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Factory>
 */
class ProductFactory extends Factory
{

    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'price' => $this->faker->numberBetween(100000, 300000),
        ];
    }
}
