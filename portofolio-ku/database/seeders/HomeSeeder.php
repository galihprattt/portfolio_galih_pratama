<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Home;

class HomeSeeder extends Seeder
{
    public function run(): void
    {
        Home::create([
            'judul' => 'Selamat Datang di Portofolio Saya',
            'subjudul' => 'Saya adalah web developer yang bersemangat membangun aplikasi modern.',
            'gambar' => null, // Atau bisa tambahkan gambar default jika ada
        ]);
    }
}
