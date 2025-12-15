<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Membuat data dummy produk
        Product::create([
            'name' => 'Produk 1',
            'description' => 'Deskripsi produk 1',
            'price' => 100000,
        ]);

        Product::create([
            'name' => 'Produk 2',
            'description' => 'Deskripsi produk 2',
            'price' => 150000,
        ]);

        Product::create([
            'name' => 'Produk 3',
            'description' => 'Deskripsi produk 3',
            'price' => 200000,
        ]);
    }
}

