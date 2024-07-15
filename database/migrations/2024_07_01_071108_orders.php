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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->string('customer_address');
            $table->string('customer_phone');
            $table->text('orders');
            $table->integer('order_quantity');
            $table->decimal('total_price', 8, 2);
            $table->timestamp('order_time')->useCurrent();
            $table->timestamps();
        });
    }

    /**+
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
