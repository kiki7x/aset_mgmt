<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        DB::table('roles')->insert([
        [
            'id' => 1,
            'name' => 'superadmin',
            'type' => 'superadmin', 
            'permission' => '', 
        ],
        [
            'id' => 2,
            'name' => 'admintik',
            'type' => 'admintik', 
            'permission' => '', 
        ],
        [
            'id' => 3,
            'name' => 'adminrt',
            'type' => 'adminrt', 
            'permission' => '', 
        ],
        [
            'id' => 4,
            'name' => 'user',
            'type' => 'user', 
            'permission' => '', 
        ],
        ]);
    }
}
