<?php

declare(strict_types=1);

namespace Database\Factories;

use Domain\Crediting\Models\CreditPackage;
use Domain\Crediting\Models\Product;
use Domain\Crediting\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TransactionFactory extends Factory
{
    protected $model = Transaction::class;

    public function definition(): array
    {
        return [
            "old_user_wallet_balance" => $this->faker->numberBetween(100, 200),
            "price" => $this->faker->numberBetween(100, 200),
            "new_user_wallet_balance" => $this->faker->numberBetween(100, 200),
            "is_increment" => $this->faker->boolean(),
            "user_id" => $this->faker->numberBetween(1, 3),
            "transactionable_id" => $this->faker->numberBetween(1, 3),
            "transactionable_type" => $this->faker->boolean() ? Product::class : CreditPackage::class,
        ];
    }
}
