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
            ['id' => '1', 'name' => 'None', 'address' => 'Jalan Raya', 'contactname' => 'Bos Muda', 'phone' => '+62', 'email' => 'nama@email.com', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '2', 'name' => 'CV PijarKom', 'address' => 'Jalan Raya', 'contactname' => 'Bos Muda', 'phone' => '+62', 'email' => 'nama@email.com', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '3', 'name' => 'CV Mataram Media', 'address' => 'Jalan Raya', 'contactname' => 'Bos Muda', 'phone' => '+62', 'email' => 'nama@email.com', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '4', 'name' => 'PT Airmas', 'address' => 'Jalan Raya', 'contactname' => 'Bos Muda', 'phone' => '+62', 'email' => 'nama@email.com', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '5', 'name' => 'UD Persediaan ITiers', 'address' => 'Jalan Raya', 'contactname' => 'Bos Muda', 'phone' => '+62', 'email' => 'nama@email.com', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '6', 'name' => 'UD Praya ATK', 'address' => 'Jalan Raya', 'contactname' => 'Bos Muda', 'phone' => '+62', 'email' => 'nama@email.com', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '7', 'name' => 'PT Kitchenware', 'address' => 'Jalan Raya', 'contactname' => 'Bos Muda', 'phone' => '+62', 'email' => 'nama@email.com', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '8', 'name' => 'PT Krida Toyota', 'address' => 'Jalan Raya', 'contactname' => 'Bos Muda', 'phone' => '+62', 'email' => 'nama@email.com', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '9', 'name' => 'PT Daikin Indonesia', 'address' => 'Jalan Raya', 'contactname' => 'Bos Muda', 'phone' => '+62', 'email' => 'nama@email.com', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
