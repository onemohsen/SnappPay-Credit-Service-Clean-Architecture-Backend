<?php

use Illuminate\Http\Response;
use Illuminate\Testing\Fluent\AssertableJson;

$permission = "create user";

beforeEach(function () use ($permission) {
    $this->route = Route('api.v1.users.store');
    $this->permission = $permission;
    $this->formValid = ['name' => 'user', 'email' => 'test@test.com', 'password' => '@#password', 'password_confirmation' => '@#password'];
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
        ->assertJson(['errors' => ['name' => [], 'email' => [], 'password' => []]]);
    // email validation is number
    $data = ['name' => 'user', 'email' => 'asdasd'];
    actionAs($user)->postJson($this->route, $data)
        ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
        ->assertJson(['errors' => ['email' => []]]);
    // password need confirmation
    $data = ['name' => 'user', 'email' => 'test@test.com', 'password' => 'asdasd'];
    actionAs($user)->postJson($this->route, $data)
        ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
        ->assertJson(['errors' => ['password' => []]]);
    // confirm same password
    $data = ['name' => 'user', 'email' => 'test@test.com', 'password' => 'password', 'password_confirmation' => 'asdasd'];
    actionAs($user)->postJson($this->route, $data)
        ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
        ->assertJson(['errors' => ['password' => []]]);

    // valide form
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
                "id",
                "name",
                "email",
                "wallet_balance",
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
                ->where('data.email', $this->formValid['email'])
                ->etc();
        });
});
