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
            ['id' => 1, 'name' => 'Requested', 'color' => '#1ecbbd',],
            ['id' => 2, 'name' => 'Pending', 'color' => '#1ccd2b',],
            ['id' => 3, 'name' => 'Deployed', 'color' => '#3479da',],
            ['id' => 4, 'name' => 'Archived', 'color' => '#959d1c',],
            ['id' => 5, 'name' => 'In Repair', 'color' => '#da2727',],
            ['id' => 6, 'name' => 'Broken', 'color' => '#776e6e',],
            ['id' => 7, 'name' => 'Deposit', 'color' => '#a79d37',],
            ['id' => 8, 'name' => 'Withdraw', 'color' => '#5bac9e',],
        ]);
    }
}
