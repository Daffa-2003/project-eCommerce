<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        \App\Models\User::factory(1)->create([
            'nik' => date('Ymd') . rand(000, 999),
            'name' => 'Daffa',
            'email' => 'coba@coba.com',
            'password' => bcrypt('123'),
            'alamat' => 'Jl. Test',
            'tglLahir' => '2021-01-01',
            'tlp' => '08123456789',
            'role' => 2,
            'is_active' => 1,
            'is_user' => 0,
            'is_admin' => 1,
        ]);
    }
}
