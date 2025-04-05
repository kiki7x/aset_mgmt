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
            ['id' => 1, 'name' => 'Desktop PC', 'color' => '#1e3fda', 'classification_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'name' => 'Laptops', 'color' => '#058e29', 'classification_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'name' => 'Servers', 'color' => '#ff0000', 'classification_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'name' => 'Printers', 'color' => '#ff0000', 'classification_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 5, 'name' => 'Routers', 'color' => '#ff0000', 'classification_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 6, 'name' => 'Switch Managed', 'color' => '#ff0000', 'classification_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 7, 'name' => 'Switch Unmanaged', 'color' => '#ff0000', 'classification_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 8, 'name' => 'AIO PC', 'color' => '#ff0000', 'classification_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 9, 'name' => 'Monitors', 'color' => '#ff0000', 'classification_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 10, 'name' => 'TV', 'color' => '#ff0000', 'classification_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 11, 'name' => 'Projectors', 'color' => '#ff0000', 'classification_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 12, 'name' => 'NVR (Network Video Recorder)', 'color' => '#ff0000', 'classification_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 13, 'name' => 'IP Cameras', 'color' => '#ff0000', 'classification_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 14, 'name' => 'Wireless Access Points', 'color' => '#ff0000', 'classification_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 15, 'name' => 'Kendaraan Roda 2', 'color' => '#ff0000', 'classification_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 16, 'name' => 'Kendaraan Roda 4', 'color' => '#ff0000', 'classification_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 17, 'name' => 'Mini Bus', 'color' => '#ff0000', 'classification_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 18, 'name' => 'Bus Besar', 'color' => '#ff0000', 'classification_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 19, 'name' => 'Genset', 'color' => '#ff0000', 'classification_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 20, 'name' => 'AC', 'color' => '#ff0000', 'classification_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 21, 'name' => 'Peralatan Dapur', 'color' => '#ff0000', 'classification_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 22, 'name' => 'Mesin Laundry', 'color' => '#ff0000', 'classification_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 23, 'name' => 'Sound System', 'color' => '#ff0000', 'classification_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 24, 'name' => 'Tablet', 'color' => '#ff0000', 'classification_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 25, 'name' => 'UPS', 'color' => '#ff0000', 'classification_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 26, 'name' => 'Scanner', 'color' => '#ff0000', 'classification_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 27, 'name' => 'Peripheral', 'color' => '#ff0000', 'classification_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 28, 'name' => 'Modem', 'color' => '#ff0000', 'classification_id' => 1, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
