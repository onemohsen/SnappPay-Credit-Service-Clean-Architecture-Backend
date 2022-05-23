<?php

declare(strict_types=1);

namespace Database\Factories;

use Domain\Shared\Models\Permission;
use Illuminate\Database\Eloquent\Factories\Factory;

class PermissionFactory extends Factory
{

    protected $model = Permission::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'label' => $this->faker->name(),
            'guard_name' => 'api',
        ];
    }
}
