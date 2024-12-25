<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('assetcategories')->insert([
            ['id' => 1, 'name' => 'Desktop PC', 'color' => '#1e3fda',],
            ['id' => 2, 'name' => 'Laptops', 'color' => '#058e29',],
            ['id' => 3, 'name' => 'Servers', 'color' => '#ff0000',],
            ['id' => 4, 'name' => 'Printers', 'color' => '#ff0000',],
            ['id' => 5, 'name' => 'Routers', 'color' => '#ff0000',],
            ['id' => 6, 'name' => 'Switch Managed', 'color' => '#ff0000',],
            ['id' => 7, 'name' => 'Switch Unmanaged', 'color' => '#ff0000',],
            ['id' => 8, 'name' => 'AIO PC', 'color' => '#ff0000',],
            ['id' => 9, 'name' => 'Monitors', 'color' => '#ff0000',],
            ['id' => 10, 'name' => 'TV', 'color' => '#ff0000',],
            ['id' => 11, 'name' => 'Projectors', 'color' => '#ff0000',],
            ['id' => 12, 'name' => 'NVR (Network Video Recorder)', 'color' => '#ff0000',],
            ['id' => 13, 'name' => 'IP Cameras', 'color' => '#ff0000',],
            ['id' => 14, 'name' => 'Wireless Access Points', 'color' => '#ff0000',],
            ['id' => 15, 'name' => 'Kendaraan Roda 2', 'color' => '#ff0000',],
            ['id' => 16, 'name' => 'Kendaraan Roda 4', 'color' => '#ff0000',],
            ['id' => 17, 'name' => 'Kendaraan Roda 6', 'color' => '#ff0000',],
            ['id' => 18, 'name' => 'Genset', 'color' => '#ff0000',],
            ['id' => 19, 'name' => 'AC', 'color' => '#ff0000',],
            ['id' => 20, 'name' => 'Peralatan Dapur', 'color' => '#ff0000',],
            ['id' => 21, 'name' => 'Mesin Laundry', 'color' => '#ff0000',],
            ['id' => 22, 'name' => 'Sound System', 'color' => '#ff0000',],
        ]);
    }
}
