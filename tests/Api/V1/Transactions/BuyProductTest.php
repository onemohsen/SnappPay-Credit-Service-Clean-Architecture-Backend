<?php

use Domain\Crediting\Models\Product;
use Illuminate\Http\Response;
use Illuminate\Testing\Fluent\AssertableJson;

$permission = "create transaction";

beforeEach(function () use ($permission) {
    $this->route = Route('api.v1.transactions.buy-product', ['product' => 1, 'user' => 1]);
    $this->permission = $permission;
    $this->product = Product::factory()->create();
});

it('tests the guest cannot access this route', function () {
    $this->postJson($this->route)
        ->assertStatus(Response::HTTP_UNAUTHORIZED)
        ->assertJson(['message' => 'Unauthenticated.']);
});
it("tests check user hasnt $permission permission cannot access", function () {
    $user = makeUserWithPermission(null);
    actionAs($user)->postJson($this->route)
        ->assertStatus(Response::HTTP_FORBIDDEN)
        ->assertJson(['message' => 'This action is unauthorized.']);
});

it("tests the user that wallet ballance is less than product price cannot buy it", function () {
    $user = makeUserWithPermission($this->permission);
    $user->wallet_balance = $this->product->price - 1;
    $user->save();
    actionAs($user)->postJson($this->route)
        ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
        ->assertJson(['errors' => ['user.wallet_balance' => []]]);
});

it('tests the ability to store item', function () {
    $user = makeUserWithPermission($this->permission);
    $user->wallet_balance = $this->product->price;
    $user->save();
    actionAs($user)->postJson($this->route)
        ->assertStatus(Response::HTTP_CREATED);
});
