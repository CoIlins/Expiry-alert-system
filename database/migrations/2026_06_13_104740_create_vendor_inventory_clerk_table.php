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
        Schema::create('vendor_inventory_clerk', function (Blueprint $table) {
            $table->id('vendor_inventory_clerk_id');

            $table->unsignedBigInteger('inventory_clerk_id');
            $table->unsignedBigInteger('vendor_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendor_inventory_clerk');
    }
};
