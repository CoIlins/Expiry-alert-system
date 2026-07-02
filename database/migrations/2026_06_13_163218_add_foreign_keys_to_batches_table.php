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
        Schema::table('batches', function (Blueprint $table) {

            $table->foreign('product_id')
                ->references('product_id')
                ->on('products')
                ->onDelete('cascade');

            // $table->foreign('vendor_id')
            //     ->references('user_id')
            //     ->on('users')
            //     ->onDelete('cascade');

            // $table->foreign('supplier_id')
            //     ->references('user_id')
            //     ->on('users')
            //     ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('batches', function (Blueprint $table) {
            $table->dropForeign(['product_id']);
            $table->dropForeign(['vendor_id']);
            $table->dropForeign(['supplier_id']);         
        });
    }
};
