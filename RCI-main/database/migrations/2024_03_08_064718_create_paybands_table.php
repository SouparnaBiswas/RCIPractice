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
        Schema::create('paybands', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('payband_type_id')->unsigned()->nullable();
            $table->string('low_band')->nullable();
            $table->string('high_band')->nullable();
            $table->string('grade_pay')->nullable();
            $table->string('year')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paybands');
    }
};
