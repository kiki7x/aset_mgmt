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
            ['id' => 1, 'client_id' => 1,'name' => 'Rektorat'],
            ['id' => 2, 'client_id' => 1,'name' => 'Gedung Kuliah 1'],
            ['id' => 3, 'client_id' => 1,'name' => 'Gedung Kuliah 2'],
            ['id' => 4, 'client_id' => 1,'name' => 'Hotel DBSH'],
            ['id' => 5, 'client_id' => 1,'name' => 'Masjid Al-Hanif'],
            ['id' => 6, 'client_id' => 1,'name' => 'GKT Rinjani'],
            ['id' => 7, 'client_id' => 1,'name' => 'Zona B Praktikum'],
            ['id' => 8, 'client_id' => 1,'name' => 'Kantin'],
        ]);
    }
}
