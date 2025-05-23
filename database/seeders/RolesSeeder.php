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
        Role::create(['name' => 'superadmin']);
        Role::create(['name' => 'admin_tik']);
        Role::create(['name' => 'admin_rt']);
        Role::create(['name' => 'staf_tik']);
        Role::create(['name' => 'staf_driver']);
        Role::create(['name' => 'staf_engineering']);
        Role::create(['name' => 'user']);
    }
}
