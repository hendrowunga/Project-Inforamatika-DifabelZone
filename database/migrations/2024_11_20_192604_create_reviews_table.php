<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->text('description');
            $table->double('rating');
            $table->foreignId('product_id')->constrained('products', 'id')->onDelete('cascade'); // Relasi ke users
            $table->foreignId('customer_id')->constrained('customers', 'id')->onDelete('cascade'); // Relasi ke user
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
