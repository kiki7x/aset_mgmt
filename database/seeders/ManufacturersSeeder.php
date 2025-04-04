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
            ['id' => 1,'name' => 'Dell'],
            ['id' => 2,'name' => 'Microsoft'],
            ['id' => 3,'name' => 'HP'],
            ['id' => 4,'name' => 'Lenovo'],
            ['id' => 5,'name' => 'Acer'],
            ['id' => 6,'name' => 'Asus'],
            ['id' => 7,'name' => 'Apple'],
            ['id' => 8,'name' => 'Epson'],
            ['id' => 9,'name' => 'Samsung'],
            ['id' => 10,'name' => 'Canon'],
            ['id' => 11,'name' => 'Sony'],
            ['id' => 12,'name' => 'Nikon'],
            ['id' => 13,'name' => 'Panasonic'],
            ['id' => 14,'name' => 'LG'],
            ['id' => 15,'name' => 'Toshiba'],
            ['id' => 16,'name' => 'Sharp'],
            ['id' => 17,'name' => 'Daikin'],
            ['id' => 18,'name' => 'Honda'],
            ['id' => 19,'name' => 'Toyota'],
            ['id' => 20,'name' => 'Mitsubishi'],
            ['id' => 21,'name' => 'Suzuki'],
            ['id' => 22,'name' => 'Mercedes Benz'],
            ['id' => 23,'name' => 'Daihatsu'],
            ['id' => 24,'name' => 'Isuzu'],
            ['id' => 25,'name' => 'Hino'],
            ['id' => 26,'name' => 'Langqing'],
            ['id' => 27,'name' => 'MSI'],
            ['id' => 28,'name' => 'Axioo'],
            ['id' => 29, 'name' => 'Ubiquiti'],
            ['id' => 30, 'name' => 'Advan'],
            ['id' => 31, 'name' => 'Logitech'],
            ['id' => 32, 'name' => 'Brother'],
            ['id' => 33, 'name' => 'TSC'],
            ['id' => 34, 'name' => 'APC'],
            ['id' => 35, 'name' => 'Scanlogic'],
            ['id' => 36, 'name' => 'Seagate'],
            ['id' => 37, 'name' => 'Synology'],
            ['id' => 38, 'name' => 'Linksys'],
            ['id' => 39, 'name' => 'Raisecom'],
            ['id' => 40, 'name' => 'Honeywell'],
        ]);
    }
}
