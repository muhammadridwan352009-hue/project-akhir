<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Account Petugas
        User::create([
            'name' => 'Rizky Maulana',
            'email' => 'petugas@smkn5surakarta.id',
            'password' => Hash::make('password123'),
            'role' => 'petugas',
        ]);

        // Account Siswa
        User::create([
            'name' => 'Nadia Putri',
            'email' => 'siswa@smkn5surakarta.id',
            'password' => Hash::make('password123'),
            'role' => 'siswa',
        ]);
    }
}