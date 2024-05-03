<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create default permissions
        Permission::create(['name' => 'list cities']);
        Permission::create(['name' => 'view cities']);
        Permission::create(['name' => 'create cities']);
        Permission::create(['name' => 'update cities']);
        Permission::create(['name' => 'delete cities']);

        Permission::create(['name' => 'list diagnoses']);
        Permission::create(['name' => 'view diagnoses']);
        Permission::create(['name' => 'create diagnoses']);
        Permission::create(['name' => 'update diagnoses']);
        Permission::create(['name' => 'delete diagnoses']);

        Permission::create(['name' => 'list hospitals']);
        Permission::create(['name' => 'view hospitals']);
        Permission::create(['name' => 'create hospitals']);
        Permission::create(['name' => 'update hospitals']);
        Permission::create(['name' => 'delete hospitals']);

        Permission::create(['name' => 'list patients']);
        Permission::create(['name' => 'view patients']);
        Permission::create(['name' => 'create patients']);
        Permission::create(['name' => 'update patients']);
        Permission::create(['name' => 'delete patients']);

        Permission::create(['name' => 'list templates']);
        Permission::create(['name' => 'view templates']);
        Permission::create(['name' => 'create templates']);
        Permission::create(['name' => 'update templates']);
        Permission::create(['name' => 'delete templates']);

        // Create user role and assign existing permissions
        $currentPermissions = Permission::all();
        $userRole = Role::create(['name' => 'user']);
        $userRole->givePermissionTo($currentPermissions);

        // Create admin exclusive permissions
        Permission::create(['name' => 'list roles']);
        Permission::create(['name' => 'view roles']);
        Permission::create(['name' => 'create roles']);
        Permission::create(['name' => 'update roles']);
        Permission::create(['name' => 'delete roles']);

        Permission::create(['name' => 'list permissions']);
        Permission::create(['name' => 'view permissions']);
        Permission::create(['name' => 'create permissions']);
        Permission::create(['name' => 'update permissions']);
        Permission::create(['name' => 'delete permissions']);

        Permission::create(['name' => 'list users']);
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'update users']);
        Permission::create(['name' => 'delete users']);

        // Create admin role and assign all permissions
        $allPermissions = Permission::all();
        $adminRole = Role::create(['name' => 'super-admin']);
        $adminRole->givePermissionTo($allPermissions);

        $user = \App\Models\User::whereEmail('admin@admin.com')->first();

        if ($user) {
            $user->assignRole($adminRole);
        }
    }
}
