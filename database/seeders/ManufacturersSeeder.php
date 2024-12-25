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
            ['id' => 1, 'name' => 'Apple'],
            ['id' => 2, 'name' => 'Dell'],
            ['id' => 3, 'name' => 'Microsoft'],
            ['id' => 4, 'name' => 'HP'],
            ['id' => 5, 'name' => 'Lenovo'],
            ['id' => 6, 'name' => 'Acer'],
            ['id' => 7, 'name' => 'Asus'],
            ['id' => 8, 'name' => 'Epson'],
            ['id' => 9, 'name' => 'Samsung'],
            ['id' => 10, 'name' => 'Canon'],
            ['id' => 11, 'name' => 'Sony'],
            ['id' => 12 , 'name' => 'Nikon'],
            ['id' => 13, 'name' => 'Panasonic'],
            ['id' => 14, 'name' => 'LG'],
            ['id' => 15, 'name' => 'Toshiba'],
            ['id' => 16, 'name' => 'Sharp'],
            ['id' => 17, 'name' => 'Daikin'],
        ]);
    }
}
