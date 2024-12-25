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
            'assettik_tag_prefix' => 'TIK', 
            'assetrt_tag_prefix' => 'RT', 
            'license_tag_prefix' => 'LIC',
        ]);
    }
}
