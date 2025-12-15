<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
    Schema::create('payments', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('order_id');
        $table->string('snap_token')->nullable();
        $table->string('status', 32)->default('pending');
        $table->dateTime('expired_at')->nullable();
        $table->dateTime('paid_at')->nullable();
        $table->timestamps();
        // Foreign key ke tabel orders
        $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
    });
    }

    public function down(): void
    {
        Schema::dropIfExists('payment');
    }
};
