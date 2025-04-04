<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ClientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('clients')->insert([
            'id' => 1,
            'name' => 'Politeknik Pariwisata Lombok', 
            'asset_tag_prefix' => 'ppl', 
            'license_tag_prefix' => 'lic',
        ]);
    }
}
