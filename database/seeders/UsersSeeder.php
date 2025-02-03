<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'admintik',
            'type' => 'admin',
            'role_id' => '1',
            'client_id' => '1',
            'title' => 'admintik',
            'mobile' => '087765977700',
            'password' => '$2y$12$O..QepZ/rF.BFUeMOk3i4.iOfRQgEMiv4V7XKQmylG0uTp08BNt6C',
            'email' => 'kiki@ppl.ac.id',
        ],
        [
            'name' => 'adminrt',
            'type' => 'admin',
            'role_id' => '1',
            'client_id' => '1',
            'title' => 'adminrt',
            'mobile' => '087777777777',
            'password' => '$2y$12$O..QepZ/rF.BFUeMOk3i4.iOfRQgEMiv4V7XKQmylG0uTp08BNt6C',
            'email' => 'kadek@ppl.ac.id',
        ]
        );
    }
}
