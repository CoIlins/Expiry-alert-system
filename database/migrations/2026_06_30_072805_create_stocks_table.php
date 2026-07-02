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
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products', 'product_id')->onDelete('cascade');
            $table->foreignId('clerk_id')->nullable()->constrained('users', 'user_id')->onDelete('set null');
            $table->integer('low_stock_threshold')->default(10);
            $table->integer('high_stock_threshold')->default(100);
            $table->integer('current_stock_level')->default(0);
            $table->string('status')->default('No Stock');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};
