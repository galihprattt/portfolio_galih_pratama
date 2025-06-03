<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kontak;

class KontakSeeder extends Seeder
{
    public function run(): void
    {
        Kontak::create([
            'email' => 'user@example.com',
            'telepon' => '08123456789',
            'alamat' => 'Jakarta, Indonesia',
        ]);
    }
}

