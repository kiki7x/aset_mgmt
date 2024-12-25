<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ModelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('models')->insert([
            ['name' => 'AIO 200 G3'],
            ['name' => 'ProBook 430 G3'],
            ['name' => 'Poweredge R220'],
            ['name' => 'Optiplex 3020 MT'],
            ['name' => 'Zephyrus M16'],
            ['name' => 'Spectre X360'],
        ]);
    }
}
