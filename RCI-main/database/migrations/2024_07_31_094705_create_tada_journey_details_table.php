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
        Schema::create('tada_journey_details', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->unsignedInteger('tada_adv_id');
            $table->string('from_location')->nullable();
            $table->string('to_location')->nullable();
            $table->dateTime('dep_datetime')->nullable();
            $table->float('distance', 10, 2)->default(0.00);
            $table->string('con_mode')->nullable();
            $table->dateTime('arrival_datetime')->nullable();
            $table->float('amount', 10, 2)->default(0.00);
            $table->string('remark')->nullable();
            $table->timestamps(); // Handles created_at and updated_at fields

            // Optional: Add indexes, foreign keys, etc. as needed
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tada_journey_details');
    }
};
