<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // DB::table('users')->insert([
        $usersData = [
        [
            // 'id' => '1',
            'username' => 'superadmin',
            'email' => 'admin@ppl.ac.id',
            'nickname' => 'superadmin', 
            'fullname' => 'superadmin', 
            'role_to_assign' => 'superadmin', 
            'client_id' => '1', 
            'title' => 'superadmin', 
            'mobile' => '087765977700', 
            'password' => Hash::make('password'), 
        ],
        [
            // 'id' => '2',
            'username' => 'wawan',
            'email' => 'wawan@ppl.ac.id',
            'nickname' => 'wawan', 
            'fullname' => 'wawan apriandi', 
            'role_to_assign' => 'superadmin', 
            'client_id' => '1', 
            'title' => 'admin bmn', 
            'mobile' => '087765432100', 
            'password' => Hash::make('password'), 
        ],
        [
            // 'id' => '3',
            'username' => 'kiki',
            'email' => 'kiki@ppl.ac.id',
            'nickname' => 'kiki', 
            'fullname' => 'kiki pranoto', 
            'role_to_assign' => 'admin_tik', 
            'client_id' => '1', 
            'title' => 'admin tik', 
            'mobile' => '087765977700', 
            'password' => Hash::make('password'), 
        ],
        [
            // 'id' => '4',
            'username' => 'kadek',
            'email' => 'kadek@ppl.ac.id',
            'nickname' => 'kadek',
            'fullname' => 'kadek surianta',
            'role_to_assign' => 'admin_rt',
            'client_id' => '1',
            'title' => 'admin rt',
            'mobile' => '087777777777',
            'password' => Hash::make('password'),
        ],
        [
            // 'id' => '5',
            'username' => 'zakaria',
            'email' => 'zakaria@ppl.ac.id',
            'nickname' => 'zakaria',
            'fullname' => 'ahmad zakaria',
            'role_to_assign' => 'staf_tik',
            'client_id' => '1',
            'title' => 'staf tik',
            'mobile' => '087777777777',
            'password' => Hash::make('password'),
        ],
        [
            // 'id' => '6',
            'username' => 'pati',
            'email' => 'pati@ppl.ac.id',
            'nickname' => 'pati',
            'fullname' => 'pati gustian',
            'role_to_assign' => 'staf_tik',
            'client_id' => '1',
            'title' => 'staf tik',
            'mobile' => '087777777777',
            'password' => Hash::make('password'),
        ],
        [
            // 'id' => '7',
            'username' => 'engineering1',
            'email' => 'engineering1@ppl.ac.id',
            'nickname' => 'eng1',
            'fullname' => 'engineering1',
            'role_to_assign' => 'staf_engineering',
            'client_id' => '1',
            'title' => 'staf engineering',
            'mobile' => '087777777777',
            'password' => Hash::make('password'),
        ],
        [
            // 'id' => '8',
            'username' => 'driver1',
            'email' => 'driver1@ppl.ac.id',
            'nickname' => 'driver1',
            'fullname' => 'driver1',
            'role_to_assign' => 'staf_driver',
            'client_id' => '1',
            'title' => 'staf driver1',
            'mobile' => '087777777777',
            'password' => Hash::make('password'),
        ],
        ];
        foreach ($usersData as $userData) {
            // Dan jangan gunakan 'id' secara eksplisit di create()
            // Biarkan Laravel membuat ID secara otomatis, atau jika kamu punya alasan kuat
            // untuk menggunakan ID statis, pastikan tabel users dikosongkan terlebih dahulu
            // atau tambahkan firstOrCreate jika id sudah ada.

            $roleToAssign = $userData['role_to_assign'];
            unset($userData['role_to_assign']); // Hapus key ini agar tidak masuk ke DB

            $user = User::firstOrCreate(
                ['email' => $userData['email']], // Kriteria unik untuk mencari user
                $userData // Data untuk membuat user baru jika tidak ditemukan
            );

            // Assign role ke user yang baru dibuat atau yang sudah ada
            $user->assignRole($roleToAssign);
        }
    }
}
