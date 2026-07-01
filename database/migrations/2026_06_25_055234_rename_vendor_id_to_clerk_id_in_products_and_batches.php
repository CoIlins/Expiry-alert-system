<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Update products table
        if (Schema::hasTable('products') && Schema::hasColumn('products', 'vendor_id')) {

            Schema::table('products', function (Blueprint $table) {
                $table->dropForeign('products_vendor_id_foreign');
                $table->renameColumn('vendor_id', 'clerk_id');
            });

            Schema::table('products', function (Blueprint $table) {
                $table->foreign('clerk_id')
                      ->references('user_id')
                      ->on('users')
                      ->onDelete('cascade');
            });
        }


        // Update batches table
        if (Schema::hasTable('batches') && Schema::hasColumn('batches', 'vendor_id')) {

            Schema::table('batches', function (Blueprint $table) {
                $table->dropForeign('batches_vendor_id_foreign');
                $table->renameColumn('vendor_id', 'clerk_id');
            });

            Schema::table('batches', function (Blueprint $table) {
                $table->foreign('clerk_id')
                      ->references('user_id')
                      ->on('users')
                      ->onDelete('cascade');
            });
        }
    }


    public function down(): void
    {
        // Rollback batches
        if (Schema::hasTable('batches') && Schema::hasColumn('batches', 'clerk_id')) {

            Schema::table('batches', function (Blueprint $table) {
                $table->dropForeign(['clerk_id']);
                $table->renameColumn('clerk_id', 'vendor_id');
            });
        }


        // Rollback products
        if (Schema::hasTable('products') && Schema::hasColumn('products', 'clerk_id')) {

            Schema::table('products', function (Blueprint $table) {
                $table->dropForeign(['clerk_id']);
                $table->renameColumn('clerk_id', 'vendor_id');
            });
        }
    }
};