<?php

use Illuminate\Http\Response;
use Illuminate\Testing\Fluent\AssertableJson;

$permission = "create credit-package";

beforeEach(function () use ($permission) {
    $this->route = Route('api.v1.credit-packages.store');
    $this->permission = $permission;
    $this->formValid = [
        'name' => 'credit-package',
        'price' => '100',
        'payment_deadline_by_days' => 12,
    ];
});

it('tests the guest cannot access this route', function () {
    $this->postJson($this->route)
        ->assertStatus(Response::HTTP_UNAUTHORIZED)
        ->assertJson(['message' => 'Unauthenticated.']);
});

it("tests check user hasnt $permission permission cannot access", function () {
    $user = makeUserWithPermission(null);
    actionAs($user)->postJson($this->route, $this->formValid)
        ->assertStatus(Response::HTTP_FORBIDDEN)
        ->assertJson(['message' => 'This action is unauthorized.']);
});

it("tests check validation data", function () {
    $user = makeUserWithPermission($this->permission);
    $data = [];
    actionAs($user)->postJson($this->route, $data)
        ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
        ->assertJson(['errors' => ['name' => [], 'price' => []]]);
    // price validation is number
    $data = ['name' => 'credit-package', 'price' => 'asdasdasd'];
    actionAs($user)->postJson($this->route, $data)
        ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
        ->assertJson(['errors' => ['price' => []]]);
    /* payment_deadline_by_days int */
    $data = ['name' => 'credit-package', 'price' => 12, 'payment_deadline_by_days' => 'asdasdasd'];
    actionAs($user)->postJson($this->route, $data)
        ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
        ->assertJson(['errors' => ['payment_deadline_by_days' => []]]);

    actionAs($user)->postJson($this->route, $this->formValid)
        ->assertStatus(Response::HTTP_CREATED);
});

it("tests check user has $permission permission authorized", function () {
    $user = makeUserWithPermission($this->permission);
    actionAs($user)->postJson($this->route, $this->formValid)->assertStatus(Response::HTTP_CREATED);
});


it('tests check structure of response', function () {
    $user = makeUserWithPermission($this->permission);
    actionAs($user)->postJson($this->route, $this->formValid)
        ->assertStatus(Response::HTTP_CREATED)
        ->assertJsonStructure([
            'data' => [
                'id',
                'name',
                'price',
                'payment_deadline_by_days',
                'links' => [
                    'self',
                    'parent',
                ],
            ],
            'message',
            'status',
        ]);
});

it('tests the ability to store item', function () {
    $user = makeUserWithPermission($this->permission);
    actionAs($user)->postJson($this->route, $this->formValid)
        ->assertStatus(Response::HTTP_CREATED)
        ->assertJson(function (AssertableJson $json) {
            $json->where('data.name', $this->formValid['name'])
                ->where('data.price', (int) $this->formValid['price'])
                ->etc();
        });
});
