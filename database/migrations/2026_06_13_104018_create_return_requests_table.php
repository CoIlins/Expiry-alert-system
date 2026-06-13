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
        Schema::create('return_requests', function (Blueprint $table) {
            $table->id('return_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('batch_id');

            $table->unsignedBigInteger('vendor_id');
            $table->unsignedBigInteger('supplier_id');

            $table->integer('quantity');
            $table->text('reason');

            $table->enum('status', [
                'pending',
                'approved',
                'rejected'
            ]);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('return_requests');
    }
};
