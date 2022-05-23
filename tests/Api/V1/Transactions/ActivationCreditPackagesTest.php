<?php

use Domain\Crediting\Models\CreditPackage;
use Illuminate\Http\Response;

$permission = "create transaction";

beforeEach(function () use ($permission) {
    $this->route = Route('api.v1.transactions.credit-package-activation', ['user' => 1, 'creditPackage' => 1]);
    $this->permission = $permission;
    $this->creditPackage = CreditPackage::factory()->create();
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

it("tests the user has not paid old credit package cannot get new", function () {
    $user = makeUserWithPermission($this->permission);
    $user->creditPackages()->attach($this->creditPackage->id, ['is_paid' => false]);
    actionAs($user)->postJson($this->route)
        ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
        ->assertJson(['errors' => ['user' => []]]);
});

it('tests the ability to store item', function () {
    $user = makeUserWithPermission($this->permission);
    $user->wallet_balance = 10000;
    $user->creditPackages()->sync([]);
    $user->save();
    actionAs($user)->postJson($this->route)
        ->assertStatus(Response::HTTP_CREATED);
});
