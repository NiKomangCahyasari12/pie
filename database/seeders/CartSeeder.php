<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;

class CartSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first(); // Ambil user pertama
        $product = Product::first(); // Ambil produk pertama
        Cart::create([
            'user_id' => $user->id,
            'product_id' => $product->id,
            'quantity' => 2,
            'total_price' => $product->price * 2,
        ]);
    }
}


