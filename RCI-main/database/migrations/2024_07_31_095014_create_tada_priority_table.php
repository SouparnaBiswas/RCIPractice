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
        Schema::create('tada_priority', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->unsignedInteger('tada_adv_id')->nullable();
            $table->string('from_location')->nullable();
            $table->string('to_location')->nullable();
            $table->unsignedTinyInteger('food_day')->default(0);
            $table->float('food_amount', 10, 2)->default(0.00);
            $table->unsignedSmallInteger('hotel_day')->default(0);
            $table->float('hotel_amount', 10, 2)->default(0.00);
            $table->float('total_da', 10, 2)->default(0.00);
            $table->timestamps(); // Handles created_at and updated_at fields

            // Optional: Add indexes, foreign keys, etc. as needed
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tada_priority');
    }
};
