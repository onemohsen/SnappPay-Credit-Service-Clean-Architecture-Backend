<?php

declare(strict_types=1);

namespace Database\Factories;

use Domain\Crediting\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Factory>
 */
class ProductFactory extends Factory
{

    protected $model = Product::class;


    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'price' => $this->faker->numberBetween(100000, 300000),
        ];
    }
}
