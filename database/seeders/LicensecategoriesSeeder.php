<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class LicensecategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('licensecategories')->insert([
            ['id' => 1,'name' => 'Operating System', 'color' => '#355ea7',],
            ['id' => 2,'name' => 'Office Suite', 'color' => '#e4d811',],
            ['id' => 3,'name' => 'Graphics Editor', 'color' => '#c62121',],
            ['id' => 4,'name' => 'Other', 'color' => '#370b0b',],
        ]);
    }
}
