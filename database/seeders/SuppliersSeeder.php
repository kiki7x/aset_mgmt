<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SuppliersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('suppliers')->insert([
            ['id' => '1', 'name' => 'CV PijarKom', 'address' => 'Jalan Raya', 'contactname' => 'Bos Muda', 'phone' => '+62', 'email' => 'nama@email.com'],
            ['id' => '2', 'name' => 'CV Mataram Media', 'address' => 'Jalan Raya', 'contactname' => 'Bos Muda', 'phone' => '+62', 'email' => 'nama@email.com'],
            ['id' => '3', 'name' => 'PT Airmas', 'address' => 'Jalan Raya', 'contactname' => 'Bos Muda', 'phone' => '+62', 'email' => 'nama@email.com'],
            ['id' => '4', 'name' => 'UD Persediaan ITiers', 'address' => 'Jalan Raya', 'contactname' => 'Bos Muda', 'phone' => '+62', 'email' => 'nama@email.com'],
            ['id' => '5', 'name' => 'UD Praya ATK', 'address' => 'Jalan Raya', 'contactname' => 'Bos Muda', 'phone' => '+62', 'email' => 'nama@email.com'],
            ['id' => '6', 'name' => 'PT Kitchenware', 'address' => 'Jalan Raya', 'contactname' => 'Bos Muda', 'phone' => '+62', 'email' => 'nama@email.com'],
            ['id' => '7', 'name' => 'PT Krida Toyota', 'address' => 'Jalan Raya', 'contactname' => 'Bos Muda', 'phone' => '+62', 'email' => 'nama@email.com'],
            ['id' => '8', 'name' => 'PT Daikin Indonesia', 'address' => 'Jalan Raya', 'contactname' => 'Bos Muda', 'phone' => '+62', 'email' => 'nama@email.com'],
        ]);
    }
}
