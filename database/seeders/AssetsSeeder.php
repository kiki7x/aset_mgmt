<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class AssetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('assets')->insert([
            [
                'id' => 1,
                'classification_id' => 1, 
                'category_id' => 2, 
                'admin_id' => 1, 
                'client_id' => 1, 
                'user_id' => 1, 
                'manufacturer_id' => 7, 
                'model_id' => 5, 
                'supplier_id' => 3, 
                'status_id' => 3,
                'location_id' => 1,
                'purchase_date' => '2024-12-01',
                'warranty_months' => 12,
                'tag' => 'TIK-1',
                'name' => 'Asus Zephyrus M16',
                'serial' => '1234567890',
                'notes' => 'hanya sekedar catatan',
                'customfields' => '',
                'qrvalue' => '1234567890',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'classification_id' => 1, 
                'category_id' => 2, 
                'admin_id' => 1, 
                'client_id' => 1, 
                'user_id' => 1, 
                'manufacturer_id' => 4, 
                'model_id' => 6, 
                'supplier_id' => 3, 
                'status_id' => 3,
                'location_id' => 1,
                'purchase_date' => '2024-12-01',
                'warranty_months' => 12,
                'tag' => 'TIK-2',
                'name' => 'HP Spectre X360',
                'serial' => '0987654321',
                'notes' => 'hanya sekedar catatan',
                'customfields' => '',
                'qrvalue' => '0987654321',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'classification_id' => 2, 
                'category_id' => 19, 
                'admin_id' => 1, 
                'client_id' => 1, 
                'user_id' => 1, 
                'manufacturer_id' => 17, 
                'model_id' => 4, 
                'supplier_id' => 6, 
                'status_id' => 3,
                'location_id' => 1,
                'purchase_date' => '2024-12-01',
                'warranty_months' => 12,
                'tag' => 'RT-1',
                'name' => 'AC Daikin 1/2 PK',
                'serial' => 'qwertyuiop',
                'notes' => 'hanya sekedar catatan',
                'customfields' => '',
                'qrvalue' => 'qwertyuiop',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'classification_id' => 2, 
                'category_id' => 18, 
                'admin_id' => 1, 
                'client_id' => 1, 
                'user_id' => 1, 
                'manufacturer_id' => 14, 
                'model_id' => 3, 
                'supplier_id' => 7, 
                'status_id' => 3,
                'location_id' => 1,
                'purchase_date' => '2024-12-01',
                'warranty_months' => 12,
                'tag' => 'RT-2',
                'name' => 'Genset 40 Kva',
                'serial' => 'asdfghjkl',
                'notes' => 'hanya sekedar catatan',
                'customfields' => '',
                'qrvalue' => 'lkjhgfdsa',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
