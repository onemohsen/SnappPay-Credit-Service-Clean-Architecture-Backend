<?php

declare(strict_types=1);

namespace Database\Factories;

use Domain\Shared\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoleFactory extends Factory
{
    protected $model = Role::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'label' => $this->faker->name(),
            'guard_name' => 'api',
        ];
    }
}
