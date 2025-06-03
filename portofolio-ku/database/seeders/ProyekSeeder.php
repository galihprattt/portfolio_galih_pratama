<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Proyek;

class ProyekSeeder extends Seeder
{
    public function run(): void
    {
        Proyek::create([
            'judul' => 'Aplikasi Toko Online',
            'deskripsi' => 'Aplikasi Laravel untuk manajemen toko dengan fitur cart, checkout, dan admin panel.',
            'link' => 'https://github.com/user/toko-online',
            'gambar' => null,
        ]);
    }
}
