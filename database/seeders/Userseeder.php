<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $id_karyawan = User::create([
            'email' => 'admin@tarvela.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin'),
            'level' => 'admin',
            'aktif' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $id_karyawan = User::create([
            'email' => 'bendahara@tarvela.com',
            'email_verified_at' => now(),
            'password' => Hash::make('bendahara1'),
            'level' => 'bendahara',
            'aktif' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $id_pelanggan = User::create([
            'email' => 'pelanggan@tarvela.com',
            'email_verified_at' => now(),
            'password' => Hash::make('pelanggan'),
            'level' => 'pelanggan',
            'aktif' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('karyawan')->insert([
            'nama_karyawan' => 'abang ceceng',
            'alamat' => 'Jl. Raya No. 1',
            'no_hp' => '081234567890',
            'jabatan' => 'administrasi',
            'created_at' => now(),
            'updated_at' => now(),
            'id_user' => $id_karyawan->id,
        ]);

        DB::table('pelanggan')->insert([
            'nama_lengkap' => 'rawr',
            'no_hp' => '081234567890',
            'alamat' => 'Jl. Raya No. 1',
            'created_at' => now(),
            'updated_at' => now(),
            'id_user' => $id_pelanggan->id,
        ]);

    }
}
