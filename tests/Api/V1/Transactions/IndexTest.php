<?php

use Domain\Crediting\Models\Product;
use Domain\Crediting\Models\Transaction;
use Domain\Shared\Models\User;
use Illuminate\Http\Response;
use Illuminate\Testing\Fluent\AssertableJson;

$permission = "show transaction";

beforeEach(function () use ($permission) {
    $this->route = Route('api.v1.transactions.index', ['include' => 'user']);
    $this->permission = $permission;
    $this->items = Transaction::factory()
        ->count(3)
        ->for(User::factory()->create())
        ->for(Product::factory(), 'transactionable')
        ->create();
});

it('tests the guest cannot access this route', function () {
    $this->getJson($this->route)
        ->assertStatus(Response::HTTP_UNAUTHORIZED)
        ->assertJson(['message' => 'Unauthenticated.']);
});

it("tests check user hasnt $permission permission cannot access", function () {
    $user = makeUserWithPermission(null);
    actionAs($user)->getJson($this->route)
        ->assertStatus(Response::HTTP_FORBIDDEN)
        ->assertJson(['message' => 'This action is unauthorized.']);
});

it("tests check user has $permission permission authorized", function () {
    $user = makeUserWithPermission($this->permission);
    actionAs($user)->getJson($this->route)->assertStatus(Response::HTTP_OK);
});

it('tests check structure of response', function () {
    $user = makeUserWithPermission($this->permission);
    actionAs($user)->getJson($this->route)
        ->assertStatus(Response::HTTP_OK)
        ->assertJsonStructure([
            'data' => [
                '*' => [
                    "id",
                    "old_user_wallet_balance",
                    "price",
                    "new_user_wallet_balance",
                    "is_increment",
                    "type",
                    "user" => [
                        "id",
                        "name",
                        "email",
                        "wallet_balance",
                        "links" => [
                            "self",
                            "parent",
                        ],
                    ],
                ],
            ],
            'links',
            'meta',
            'message',
            'status',
        ]);
});

it('tests check sort items are desc', function () {
    $user = makeUserWithPermission($this->permission);
    $response = actionAs($user)->getJson($this->route);
    $this->assertEquals(
        $this->items->last()->id,
        collect($response['data'])->recursive()->first()->get('id')
    );
});
