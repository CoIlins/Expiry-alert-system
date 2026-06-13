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
        Schema::table('invoice_items', function (Blueprint $table) {
            $table->foreign('invoice_id')
                ->references('invoice_id')
                ->on('invoices')
                ->onDelete('cascade');

            $table->foreign('product_id')
                ->references('product_id')
                ->on('products')
                ->onDelete('cascade');

            $table->foreign('batch_id')
                ->references('batch_id')
                ->on('batches')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('invoice_items', function (Blueprint $table) {
            $table->dropForeign(['invoice_id']);
            $table->dropForeign(['product_id']);
            $table->dropForeign(['batch_id']);
        });
    }
};
