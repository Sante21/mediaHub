<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Roles
        $rolAdmin = Role::create(['name' => 'admin']);
        User::find(1)->assignRole("admin");

        $rolPlatform = Role::create(['name' => 'plartform']);
        User::find(2)->assignRole("plartform");

        $rolClient = Role::create(['name' => 'client']);
        User::find(3)->assignRole("client");

        // Permisos
        $createMedia = Permission::create(['name' => 'createMedia']);
        $rolAdmin->givePermissionTo($createMedia);

        $editMedia = Permission::create(['name' => 'editMedia']);
        $rolAdmin->givePermissionTo($editMedia);
        $rolPlatform->givePermissionTo($editMedia);

        $deleteMedia = Permission::create(['name' => 'deleteMedia']);
        $rolAdmin->givePermissionTo($deleteMedia);

        $seeMedias = Permission::create(['name' => 'seeMedias']);
        $rolAdmin->givePermissionTo($seeMedias);
        $rolPlatform->givePermissionTo($seeMedias);
        $rolClient->givePermissionTo($seeMedias);

        $createPlatform = Permission::create(['name' => 'createPlatform']);
        $rolAdmin->givePermissionTo($createPlatform);
        $rolPlatform->givePermissionTo($createPlatform);

        $editPlatform = Permission::create(['name' => 'editPlatform']);
        $rolAdmin->givePermissionTo($editPlatform);
        $rolPlatform->givePermissionTo($editPlatform);

        $deletePlatform = Permission::create(['name' => 'deletePlatform']);
        $rolAdmin->givePermissionTo($deletePlatform);
        $rolPlatform->givePermissionTo($deletePlatform);

        $manageUsers = Permission::create(['name' => 'manageUsers']);
        $rolAdmin->givePermissionTo($manageUsers);
    }
}
