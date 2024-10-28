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
        Schema::create('payment', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date_of_payment');
            $table->time('time_of_payment');
            $table->enum('PaymentMode',['Cash','Bank Transfer'])->default('Cash');
            $table->timestamps();
        });

        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->enum('order_status', ['pending', 'cancel','success'])->default('pending');
            $table->dateTime('order_date');
            $table->decimal('order_amount',6, 3);
            $table->foreignId('customer_id')->constrained('users','id')->onDelete('cascade'); // Relasi ke users
            $table->foreignId('address_id')->constrained('addresses','id')->onDelete('cascade'); // Relasi ke alamat users
            $table->foreignId('payment_id')->constrained('payment','id')->onDelete('cascade'); // Relasi ke transaksi users
            $table->timestamps();
        });

        Schema::create('cart_of_order', function (Blueprint $table) {
            $table->foreignId('cart_id')->constrained('cart','id')->onDelete('cascade'); // Relasi ke cart
            $table->foreignId('order_id')->constrained('order','id')->onDelete('cascade'); // Relasi ke users
            $table->integer('quantity_product')->default(1);;
            $table->decimal('price_product',6, 3);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_of_order');
        Schema::dropIfExists('order');
        Schema::dropIfExists('payment');
    }
};
