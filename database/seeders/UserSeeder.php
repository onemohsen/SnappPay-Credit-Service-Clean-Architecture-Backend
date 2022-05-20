<?php

declare(strict_types=1);

namespace Database\Seeders;

use Domain\Shared\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@test.com',
            'password' => bcrypt('admin'),
        ]);

        $user = User::create([
            'name' => 'User',
            'email' => 'user@test.com',
            'password' => bcrypt('user'),
        ]);

        $admin->assignRole('admin');
        $user->assignRole('user');


        \Domain\Shared\Models\User::factory(10)->create();

        $products = \Domain\Crediting\Models\Product::all();

        $creditPackages = \Domain\Crediting\Models\CreditPackage::all();

        $users = \Domain\Shared\Models\User::all();


        $users->each(function ($user) use ($creditPackages, $products) {
            $user->assignRole('user');
            $creditPackages->each(function ($creditPackage) use ($user) {
                if ((bool)random_int(0, 1)) {
                    $transaction = $creditPackage->transactions()->create([
                        'old_user_wallet_balance' => $user->wallet_balance,
                        'price' => $creditPackage->price,
                        'new_user_wallet_balance' => $user->wallet_balance + $creditPackage->price,
                        'is_increment' => true,
                        'user_id' => $user->id,
                    ]);
                    $user->wallet_balance = $transaction->new_user_wallet_balance;
                    $user->save();
                    $user->refresh();
                }
            });

            $products->each(function ($product) use ($user) {
                if ((bool)random_int(0, 1) && $user->wallet_balance >= $product->price) {
                    $product->transactions()->create([
                        'old_user_wallet_balance' => $user->wallet_balance,
                        'price' => $product->price,
                        'new_user_wallet_balance' => $user->wallet_balance - $product->price,
                        'is_increment' => false,
                        'user_id' => $user->id,
                    ]);

                    $user->wallet_balance -= $product->price;
                    $user->save();
                    $user->refresh();
                }
            });
        });
    }
}
