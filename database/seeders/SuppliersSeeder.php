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
            ['name' => 'CV PijarKom', 'address' => 'Jalan Raya', 'contactname' => 'Bos Muda', 'phone' => '+62', 'email' => 'nama@email.com'],
            ['name' => 'CV Mataram Media', 'address' => 'Jalan Raya', 'contactname' => 'Bos Muda', 'phone' => '+62', 'email' => 'nama@email.com'],
            ['name' => 'PT Airmas', 'address' => 'Jalan Raya', 'contactname' => 'Bos Muda', 'phone' => '+62', 'email' => 'nama@email.com'],
            ['name' => 'UD Persediaan ITiers', 'address' => 'Jalan Raya', 'contactname' => 'Bos Muda', 'phone' => '+62', 'email' => 'nama@email.com'],
            ['name' => 'UD Praya ATK', 'address' => 'Jalan Raya', 'contactname' => 'Bos Muda', 'phone' => '+62', 'email' => 'nama@email.com'],
            ['name' => 'PT Kitchenware', 'address' => 'Jalan Raya', 'contactname' => 'Bos Muda', 'phone' => '+62', 'email' => 'nama@email.com'],
            ['name' => 'PT Krida Toyota', 'address' => 'Jalan Raya', 'contactname' => 'Bos Muda', 'phone' => '+62', 'email' => 'nama@email.com'],
            ['name' => 'PT Daikin Indonesia', 'address' => 'Jalan Raya', 'contactname' => 'Bos Muda', 'phone' => '+62', 'email' => 'nama@email.com'],
        ]);
    }
}
