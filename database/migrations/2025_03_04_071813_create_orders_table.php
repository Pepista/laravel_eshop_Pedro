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
            $table->string('order_number');  // Add order_number column
            $table->string('customer_name');  // Add customer_name column
            $table->enum('status', ['pending', 'completed', 'cancelled']);  // Add status column with allowed values
            $table->decimal('total_amount', 10, 2);  // Add total_amount column
            $table->date('order_date');  // Add order_date column
            $table->timestamps();  // Include timestamps for created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
