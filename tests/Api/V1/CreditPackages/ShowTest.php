<?php

use Domain\Crediting\Models\CreditPackage;
use Illuminate\Http\Response;
use Illuminate\Testing\Fluent\AssertableJson;

$permission = "show credit-package";

beforeEach(function () use ($permission) {
    $this->item = CreditPackage::factory()->create();
    $this->route = Route('api.v1.credit-packages.show', ['creditPackage' => $this->item->id]);
    $this->permission = $permission;
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

it('tests the ability to show an existing item', function () {
    $user = makeUserWithPermission($this->permission);
    actionAs($user)->getJson($this->route)
        ->assertStatus(Response::HTTP_OK)
        ->assertJson(function (AssertableJson $json) {
            $json->where('data.id', $this->item->id)
                ->where('data.name', $this->item->name)
                ->etc();
        });
});
