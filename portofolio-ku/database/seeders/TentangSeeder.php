<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tentang;

class TentangSeeder extends Seeder
{
    public function run(): void
    {
        Tentang::create([
            'deskripsi' => 'Saya seorang developer dengan fokus pada Laravel dan Tailwind CSS.',
            'foto' => null, // atau 'tentang/default.jpg' jika ada
        ]);
    }
}
