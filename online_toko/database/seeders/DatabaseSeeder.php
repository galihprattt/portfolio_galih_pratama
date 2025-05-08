<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Memanggil seeder lain
        $this->call([
            CategorySeeder::class,
            ProductSeeder::class,
            AdminSeeder::class, // Memanggil AdminSeeder
        ]);

        // Jika ingin tetap membuat user test, bisa aktifkan ini:
        // User::factory(10)->create();

        // Atau buat user secara manual seperti berikut:
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
