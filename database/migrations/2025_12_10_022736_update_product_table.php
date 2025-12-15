<?php
 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
 
return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
    if (!Schema::hasColumn('products', 'latitude')) {
        $table->decimal('latitude', 10, 7)->nullable();
    }
    if (!Schema::hasColumn('products', 'longitude')) {
        $table->decimal('longitude', 11, 7)->nullable();
    }

    $table->decimal('price', 10, 2)->nullable()->change();
});

    }
    
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('latitude');
            $table->dropColumn('longitude');
            $table->dropColumn('price');
        });
    }
};

