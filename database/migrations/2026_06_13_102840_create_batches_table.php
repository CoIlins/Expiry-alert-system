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
        Schema::create('batches', function (Blueprint $table) {
            $table->id('batch_id');

            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('vendor_id');
            $table->unsignedBigInteger('supplier_id');

            $table->integer('quantity');
            $table->decimal('unit_price', 10, 2);

            $table->date('manufacture_date');
            $table->date('expiry_date');

            $table->enum('status', [
                'active',
                'expiring_soon',
                'expired',
                'returned'
            ]);
            $table->timestamps();
        });
    }


/**
 * Reverse the migrations.
 */
public function down(): void
{
        Schema::dropIfExists('batches');
    }
};
