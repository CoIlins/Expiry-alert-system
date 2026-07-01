<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
//     /**
//      * Run the migrations.
//      */
//     public function up(): void
//     {
//         // // 1. Update the 'products' table if it has a vendor_id column
//         // if (Schema::hasTable('products') && Schema::hasColumn('products', 'vendor_id')) {
//         //     Schema::table('products', function (Blueprint $table) {
//         //         // Drop the foreign key first (Standard Laravel naming convention)
//         //         // $table->dropForeign('products_vendor_id_foreign');
                
//         //         // Rename the column
//         //         $table->renameColumn('vendor_id', 'clerk_id');
//         //     });

//         //     Schema::table('products', function (Blueprint $table) {
//         //         // Re-add the foreign key constraint pointing to the users table
//         //         $table->foreign('clerk_id')
//         //               ->references('user_id')
//         //               ->on('users')
//         //               ->onDelete('cascade');
//         //     });
//         // }

//         // // 2. Update the 'batches' table
//         // if (Schema::hasTable('batches') && Schema::hasColumn('batches', 'vendor_id')) {
//         //     Schema::table('batches', function (Blueprint $table) {
//         //         // Drop the foreign key constraint found in your schema
//         //         $table->dropForeign('batches_vendor_id_foreign');
                
//         //         // Rename the column
//         //         $table->renameColumn('vendor_id', 'clerk_id');
//         //     });

//         //     Schema::table('batches', function (Blueprint $table) {
//         //         // Re-add the foreign key constraint pointing to the users table
//         //         $table->foreign('clerk_id')
//         //               ->references('user_id')
//         //               ->on('users')
//         //               ->onDelete('cascade');
//         //     });
//         }
//     }


//     public function down(): void
//     {
//         // Rollback 'batches' table changes
//         // if (Schema::hasTable('batches') && Schema::hasColumn('batches', 'clerk_id')) {
//         //     Schema::table('batches', function (Blueprint $table) {
//         //         $table->dropForeign(['clerk_id']);
//         //         $table->renameColumn('clerk_id', 'vendor_id');
//         //     });

//         //     Schema::table('batches', function (Blueprint $table) {
//         //         $table->foreign('vendor_id')
//         //               ->references('user_id')
//         //               ->on('users')
//         //               ->onDelete('cascade');
//         //     });
//         // }

//         // // Rollback 'products' table changes
//         // if (Schema::hasTable('products') && Schema::hasColumn('products', 'clerk_id')) {
//         //     Schema::table('products', function (Blueprint $table) {
//         //         $table->dropForeign(['clerk_id']);
//         //         $table->renameColumn('clerk_id', 'vendor_id');
//         //     });

//         //     Schema::table('products', function (Blueprint $table) {
//         //         $table->foreign('vendor_id')
//         //               ->references('user_id')
//         //               ->on('users')
//         //               ->onDelete('cascade');
//         //     });
//     //     }
//     // }
};