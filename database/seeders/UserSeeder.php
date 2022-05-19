<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        $products = \App\Models\Product::all();

        $creditPackages = \App\Models\CreditPackage::all();

        $users = \App\Models\User::all();


        $users->each(function ($user) use ($creditPackages, $products) {

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
