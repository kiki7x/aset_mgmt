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
            ['name' => 'Genset 40Kva'],
            ['name' => 'Daikin 1/2 PK'],
            ['name' => 'Zephyrus M16'],
            ['name' => 'Spectre X360'],
        ]);
    }
}
