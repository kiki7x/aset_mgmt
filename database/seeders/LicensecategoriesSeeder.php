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
            ['id' => 1,'name' => 'None', 'color' => '#ff0000',],
            ['id' => 2,'name' => 'Operating System', 'color' => '#355ea7',],
            ['id' => 3,'name' => 'Office Suite', 'color' => '#e4d811',],
            ['id' => 4,'name' => 'Graphics Editor', 'color' => '#c62121',],
            ['id' => 5,'name' => 'Other', 'color' => '#370b0b',],
        ]);
    }
}
