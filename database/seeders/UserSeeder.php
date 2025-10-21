<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'nama' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin'),
                'role' => 'admin',
            ],
            [
                'nama' => 'Dokter',
                'email' => 'dokter@gmail.com',
                'password' => Hash::make('dokter'),
                'role' => 'dokter',
            ],
            [
                'nama' => 'Pasien',
                'email' => 'pasien@gmail.com',
                'password' => Hash::make('pasien'),
                'role' => 'pasien',
            ],
            [
                'nama' => 'Dr. Ahmad Rahman, Sp.PD',
                'alamat' => 'Jl. Dokter No. 3, Jakarta',
                'no_ktp' => '3201234567890004',
                'no_hp' => '081234567893',
                'email' => 'dokter.umum@gmail.com',
                'password' => Hash::make('dokter'),
                'role' => 'dokter',
                'id_poli' => 3,
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}

