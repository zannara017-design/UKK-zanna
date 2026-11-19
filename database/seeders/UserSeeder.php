<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'role' => 'admin',
            'status_aktif' => 1,
        ]);

         User::create([
            'name' => 'Petugas',
            // 'username' => 'petugas1',
            'email' => 'petugas1@gmail.com',
            'password' => Hash::make('petugas'),
            'role' => 'petugas',
            'status_aktif' => 1,
        ]);

         User::create([
            'name' => 'Owner',
            // 'username' => 'owner',
            'email' => 'owner@gmail.com',
            'password' => Hash::make('owner'),
            'role' => 'owner',
            'status_aktif' => 1,
        ]);
    }
}
