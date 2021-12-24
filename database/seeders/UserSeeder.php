<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nik' => "123456789",
            'name' => "admin",
            'username' => "admin",
            'email' => "admin@gmail.com",
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'tempat_lahir' => "Malang",
            'tanggal_lahir' => \Carbon\Carbon::now(),
            'jenis_kelamin' => "laki-laki",
            'alamat' => "Malang",
            'operational_time_start' => '08:00:00',
            'operational_time_end' => '17:00:00',
            'no_hp' => "+62122-1233-1234",
            'foto' => "foto_profil2.png",
            'role' => "admin",
            'status' => "1",
            'remember_token' => Str::random(10),
        ]);
    }
}
