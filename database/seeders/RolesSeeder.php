<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;


class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        Role::create(['name' => 'super_admin']);
        Role::create(['name' => 'admintik']);
        Role::create(['name' => 'adminnrt']);
        Role::create(['name' => 'user']);
    }
}
