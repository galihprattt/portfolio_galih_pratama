<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::create([
            'name' => 'Kaos Polos',
            'description' => 'Kaos polos bahan katun nyaman dipakai.',
            'price' => 100000,
            'category_id' => 1, // pastikan kategori id 1 sudah ada
            'image' => null, // kosongin aja, nanti pakai gambar default
        ]);

        Product::create([
            'name' => 'Jaket Hoodie',
            'description' => 'Hoodie keren untuk musim dingin.',
            'price' => 250000,
            'category_id' => 1, // pastikan kategori id 1 sudah ada
            'image' => null, // kosongin aja, nanti pakai gambar default
        ]);
    }
}
