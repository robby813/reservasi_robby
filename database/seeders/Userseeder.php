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
        $id_pelanggan = User::create([
            'email' => 'admin@tarvela.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin'),
            'level' => 'admin',
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
            'id_user' => $id_pelanggan->id,
        ]);

    }
}
