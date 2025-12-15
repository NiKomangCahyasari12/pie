<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration 
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('order_id', 32)->unique();
            $table->unsignedBigInteger('user_id'); // Foreign key untuk user yang membuat order
            $table->decimal('total_price', 10, 2); // Total harga dari order
             $table->enum('status', ['pending', 'processing', 'completed', 'cancelled'])->default('pending');
    $table->enum('payment_status', ['unpaid', 'paid', 'failed'])->default('unpaid');
            $table->timestamps(); // Created at dan Updated at

            // Foreign key untuk user
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};


