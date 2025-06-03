<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Panggil seeder admin dan lainnya di sini
        $this->call([
            AdminUserSeeder::class,
            HomeSeeder::class,
            TentangSeeder::class,
            ProyekSeeder::class,
            KontakSeeder::class,
        ]);
    }
}
