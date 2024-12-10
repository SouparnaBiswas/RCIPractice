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
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('city_type')->enum(['X', 'Y', 'Z'])->nullable();
            $table->boolean('status')->default(0)->comment('0=Inactive, 1=Active');
            $table->string('tpt_type')->enum('higher','other')->nullable();
            $table->string('is_cghs')->enum('active','other')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cities');
    }
};
