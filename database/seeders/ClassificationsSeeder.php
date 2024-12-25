<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ClassificationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('assetclassifications')->insert([
            ['id' => 1,'name' => 'TIK'],
            ['id' => 2, 'name' => 'RT']
        ]);
    }
}
