<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class LocationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('locations')->insert([
            ['id' => 1, 'client_id' => 1,'name' => 'None', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'client_id' => 1,'name' => 'Rektorat', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'client_id' => 1,'name' => 'Gedung Kuliah 1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'client_id' => 1,'name' => 'Gedung Kuliah 2', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 5, 'client_id' => 1,'name' => 'Hotel DBSH', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 6, 'client_id' => 1,'name' => 'Masjid Al-Hanif', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 7, 'client_id' => 1,'name' => 'GKT Rinjani', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 8, 'client_id' => 1,'name' => 'Zona B Praktikum', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 9, 'client_id' => 1,'name' => 'Kantin', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
