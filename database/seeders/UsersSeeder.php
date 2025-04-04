<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        DB::table('users')->insert([
        [
            'id' => '1',
            'username' => 'superadmin',
            'email' => 'admin@ppl.ac.id',
            'name' => 'superadmin', 
            // 'type' => 'superadmin', 
            'role_id' => '1', 
            'client_id' => '1', 
            'title' => 'superadmin', 
            'mobile' => '087765977700', 
            'password' => Hash::make('password'), 
        ],
        [
            'id' => '2',
            'username' => 'wawan',
            'email' => 'wawan@ppl.ac.id',
            'name' => 'wawan', 
            // 'type' => 'superadmin', 
            'role_id' => '1', 
            'client_id' => '1', 
            'title' => 'adminbmn', 
            'mobile' => '087765432100', 
            'password' => Hash::make('password'), 
        ],
        [
            'id' => '3',
            'username' => 'kiki',
            'email' => 'kiki@ppl.ac.id',
            'name' => 'kiki', 
            // 'type' => 'admin', 
            'role_id' => '2', 
            'client_id' => '1', 
            'title' => 'admintik', 
            'mobile' => '087765977700', 
            'password' => Hash::make('password'), 
        ],
        [
            'id' => '4',
            'username' => 'kadek',
            'email' => 'kadek@ppl.ac.id',
            'name' => 'kadek',
            // 'type' => 'admin',
            'role_id' => '3',
            'client_id' => '1',
            'title' => 'adminrt',
            'mobile' => '087777777777',
            'password' => Hash::make('password'),
        ]
        ]);
    }
}
