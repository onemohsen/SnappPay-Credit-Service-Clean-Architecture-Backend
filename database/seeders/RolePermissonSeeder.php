<?php

namespace Database\Seeders;

use Domain\Shared\Models\Permission;
use Domain\Shared\Models\Role;
use Illuminate\Database\Seeder;

class RolePermissonSeeder extends Seeder
{
    public function run(): void
    {
        $roles = collect([
            ['name' => 'admin', 'label' => 'مدیر'],
            ['name' => 'user', 'label' => 'کاربر'],
        ]);

        $permissions = collect([
            ['name' => 'show', 'label' => 'نمایش'],
            ['name' => 'create', 'label' => 'ایجاد'],
            ['name' => 'edit', 'label' => 'ویرایش'],
            ['name' => 'delete', 'label' => 'حذف']
        ]);

        $modelsOnlyShow = collect([
            ['name' => 'admin', 'label' => 'پنل ادمین'],
            ['name' => 'dashboard', 'label' => 'داشبورد'],
        ]);

        $models = collect([
            ['name' => 'user', 'label' => __('models.user')],
            ['name' => 'role', 'label' => __('models.role')],
            ['name' => 'permission', 'label' => __('models.permission')],
            ['name' => 'product', 'label' => __('models.product')],
            ['name' => 'credit-package', 'label' => __('models.creditPackage')],
        ]);

        $roles->each(function ($role) use ($permissions) {
            Role::create([
                'name' => $role['name'],
                'label' => $role['label'],
                'guard_name' => 'api'
            ]);
        });

        $modelsOnlyShow->each(function ($item) {
            Permission::create([
                'name' => 'show ' . $item['name'],
                'label' => 'نمایش ' . $item['label'],
                'guard_name' => 'api'
            ]);
        });

        $models->each(function ($model) use ($permissions) {
            $permissions->each(function ($permission) use ($model) {
                Permission::create([
                    'name' => $permission['name'] . ' ' . $model['name'],
                    'label' => $permission['label'] . ' ' . $model['label'],
                    'guard_name' => 'api'
                ]);
            });
        });


        $adminRole = Role::where('name', 'admin')->first();
        $allPermissions = Permission::all();
        $adminRole->givePermissionTo($allPermissions);
    }
}
