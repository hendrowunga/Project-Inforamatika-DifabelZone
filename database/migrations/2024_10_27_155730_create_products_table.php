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
        Schema::create('category', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('deskripsi');
            $table->timestamps();
        });

        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name',100);
            $table->integer('stock')->default(0);
            $table->string('image');
            $table->decimal('price',6, 3);
            $table->foreignId('seller_id')->constrained('users','id')->onDelete('cascade'); // Relasi ke users
            $table->foreignId('category_id')->constrained('category','id')->onDelete('cascade'); // Relasi ke category
            $table->timestamps();
        });

        Schema::create('cart', function (Blueprint $table) {
            $table->id();
            $table->integer('total_quantity');
            $table->decimal('total_price',6,3);
            $table->foreignId('customer_id')->constrained('users','id')->onDelete('cascade'); // Relasi ke user
            $table->timestamps();
        });

        Schema::create('cart_of_product', function (Blueprint $table) {
            $table->foreignId('product_id')->constrained('products','id')->onDelete('cascade'); // Relasi ke product
            $table->foreignId('cart_id')->constrained('cart','id')->onDelete('cascade'); // Relasi ke cart
            $table->integer('quantity_product');
            $table->decimal('price_product',6,3);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('review');
        Schema::dropIfExists('cart_of_product');
        Schema::dropIfExists('products');
        Schema::dropIfExists('category');
        Schema::dropIfExists('cart');
    }
};