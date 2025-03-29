<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        // $roleAdmin = Role::where('name', 'Admin')->first();
        // $roleMember = Role::where('name', 'Member')->first();

        // User::factory(2)->create()->each(function($user) use ($roleAdmin) {

        // });
        User::factory(10)->create();
    }
}
