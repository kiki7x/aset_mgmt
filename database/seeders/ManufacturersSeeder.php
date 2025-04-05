<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ManufacturersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('manufacturers')->insert([
            ['id' => 1,'name' => 'Dell', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2,'name' => 'Microsoft', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3,'name' => 'HP', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4,'name' => 'Lenovo', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 5,'name' => 'Acer', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 6,'name' => 'Asus', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 7,'name' => 'Apple', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 8,'name' => 'Epson', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 9,'name' => 'Samsung', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 10,'name' => 'Canon', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 11,'name' => 'Sony', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 12,'name' => 'Nikon', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 13,'name' => 'Panasonic', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 14,'name' => 'LG', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 15,'name' => 'Toshiba', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 16,'name' => 'Sharp', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 17,'name' => 'Daikin', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 18,'name' => 'Honda', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 19,'name' => 'Toyota', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 20,'name' => 'Mitsubishi', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 21,'name' => 'Suzuki', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 22,'name' => 'Mercedes Benz', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 23,'name' => 'Daihatsu', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 24,'name' => 'Isuzu', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 25,'name' => 'Hino', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 26,'name' => 'Langqing', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 27,'name' => 'MSI', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 28,'name' => 'Axioo', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 29, 'name' => 'Ubiquiti', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 30, 'name' => 'Advan', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 31, 'name' => 'Logitech', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 32, 'name' => 'Brother', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 33, 'name' => 'TSC', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 34, 'name' => 'APC', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 35, 'name' => 'Scanlogic', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 36, 'name' => 'Seagate', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 37, 'name' => 'Synology', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 38, 'name' => 'Linksys', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 39, 'name' => 'Raisecom', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 40, 'name' => 'Honeywell', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
