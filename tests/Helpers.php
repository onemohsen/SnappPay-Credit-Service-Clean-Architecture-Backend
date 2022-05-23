<?php

declare(strict_types=1);

use Domain\Shared\Models\Permission;
use Domain\Shared\Models\User;

function actionAs(User $user, $driver = null)
{
    return test()->actingAs($user, $driver);
}

function makeUserWithPermission(string|null $permission = null)
{
    $user = User::factory()->create();
    if ($permission) {
        $user->permissions()->create(Permission::factory()->make(['name' => $permission])->toArray());
    }
    return $user;
}
