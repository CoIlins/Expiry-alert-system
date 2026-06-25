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
        if (Schema::hasTable('products')) {
            Schema::table('products', function (Blueprint $table) {
                // 1. Add the clerk_id column as a bigInteger unsigned (matching user_id type)
                // It's recommended to place it after your primary key or name column
                $table->foreignId('clerk_id')
                      ->after('product_id') 
                      ->nullable() // Keep nullable initially if you have existing data
                      ->constrained('users', 'user_id')
                      ->onDelete('cascade'); // If the clerk user is deleted, their products drop
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('products')) {
            Schema::table('products', function (Blueprint $table) {
                // Drop foreign key and column during rollback
                $table->dropForeign(['clerk_id']);
                $table->dropColumn('clerk_id');
            });
        }
    }
};