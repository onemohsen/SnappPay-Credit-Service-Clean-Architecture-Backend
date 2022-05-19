<?php

declare(strict_types=1);

namespace Database\Factories;

use Domain\Crediting\Models\CreditPackage;
use Illuminate\Database\Eloquent\Factories\Factory;


class CreditPackageFactory extends Factory
{

    protected $model = CreditPackage::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'price' => $this->faker->numberBetween(100000, 300000),
            'payment_deadline_by_days' => $this->faker->numberBetween(1, 30),
        ];
    }
}
