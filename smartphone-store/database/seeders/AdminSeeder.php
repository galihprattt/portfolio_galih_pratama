<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@store.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('password'), // Ganti dengan password yang aman
                'is_admin' => true, // Pastikan field 'is_admin' ada di tabel users
            ]
        );
    }
}
