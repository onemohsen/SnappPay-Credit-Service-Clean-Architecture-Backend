<?php

use Domain\Crediting\Models\Product;
use Illuminate\Http\Response;
use Illuminate\Testing\Fluent\AssertableJson;

$permission = "edit product";

beforeEach(function () use ($permission) {
    $this->item = Product::factory()->create();
    $this->route = Route('api.v1.products.update', ['product' => 1]);
    $this->permission = $permission;
    $this->formValid = [
        'name' => 'Product',
        'price' => '100',
    ];
});

it('tests the guest cannot access this route', function () {
    $this->patchJson($this->route)
        ->assertStatus(Response::HTTP_UNAUTHORIZED)
        ->assertJson(['message' => 'Unauthenticated.']);
});

it("tests check user hasnt $permission permission cannot access", function () {
    $user = makeUserWithPermission(null);
    actionAs($user)->patchJson($this->route, $this->formValid)
        ->assertStatus(Response::HTTP_FORBIDDEN)
        ->assertJson(['message' => 'This action is unauthorized.']);
});

it("tests check validation data", function () {
    $user = makeUserWithPermission($this->permission);
    $data = [];
    actionAs($user)->patchJson($this->route, $data)
        ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    // price validation is number
    $data = ['name' => 'Product', 'price' => 'asdasdasd'];
    actionAs($user)->patchJson($this->route, $data)
        ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
        ->assertJson(['errors' => ['price' => []]]);
});

it("tests check user has $permission permission authorized", function () {
    $user = makeUserWithPermission($this->permission);
    actionAs($user)->patchJson($this->route, $this->formValid)->assertStatus(Response::HTTP_ACCEPTED);
});

it('tests check structure of response', function () {
    $user = makeUserWithPermission($this->permission);
    actionAs($user)->patchJson($this->route, $this->formValid)
        ->assertStatus(Response::HTTP_ACCEPTED)
        ->assertJsonStructure([
            'data' => [
                'id',
                'name',
                'price',
                'links' => [
                    'self',
                    'parent',
                ],
            ],
            'message',
            'status',
        ]);
});

it('tests the ability to update item', function () {
    $user = makeUserWithPermission($this->permission);
    actionAs($user)->patchJson($this->route, $this->formValid)
        ->assertStatus(Response::HTTP_ACCEPTED)
        ->assertJson(function (AssertableJson $json) {
            $json->where('data.name', $this->formValid['name'])
                ->where('data.price', (int) $this->formValid['price'])
                ->etc();
        });
    $this->item->refresh();
    $this->assertEquals($this->formValid['name'], $this->item->name);
});
