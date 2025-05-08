<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User; // Ganti dengan model Admin jika kamu pakai model admin khusus

class AdminSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'galih@gmail.com',
            'password' => Hash::make('admin12345678'), // Ganti dengan password admin yang diinginkan
        ]);
    }
}
