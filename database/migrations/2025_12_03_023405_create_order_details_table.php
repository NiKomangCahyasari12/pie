<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up(): void
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('order_id'); // Foreign key ke tabel orders
            $table->unsignedBigInteger('product_id'); // Foreign key ke tabel products
            $table->integer('quantity'); // Jumlah produk yang dipesan
            $table->decimal('price', 10, 2); // Harga per item produk
            $table->timestamps(); // Created at dan Updated at

            // Foreign key ke tabel orders
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            // Foreign key ke tabel products
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};

