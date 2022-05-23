<?php

use Domain\Crediting\Models\Product;
use Illuminate\Http\Response;
use Illuminate\Testing\Fluent\AssertableJson;

$permission = "show product";

beforeEach(function () use ($permission) {
    $this->route = Route('api.v1.products.index');
    $this->permission = $permission;
    $this->items = Product::factory(2)->create();
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
                    'id',
                    'name',
                    'price',
                    'links' => [
                        'self',
                        'parent',
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
