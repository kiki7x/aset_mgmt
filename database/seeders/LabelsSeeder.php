<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class LabelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('labels')->insert([
            ['id' => 1, 'name' => 'None', 'color' => '#ff0000', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'name' => 'Requested', 'color' => '#1ecbbd', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'name' => 'Pending', 'color' => '#1ccd2b', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'name' => 'Deployed', 'color' => '#3479da', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 5, 'name' => 'Archived', 'color' => '#959d1c', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 6, 'name' => 'In Repair', 'color' => '#da2727', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 7, 'name' => 'Broken', 'color' => '#776e6e', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 8, 'name' => 'Deposit', 'color' => '#a79d37', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 9, 'name' => 'Withdraw', 'color' => '#5bac9e', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
