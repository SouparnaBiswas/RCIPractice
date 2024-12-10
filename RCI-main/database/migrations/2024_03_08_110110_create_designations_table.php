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
        Schema::create('designations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('category_id')->unsigned()->nullable();
            $table->bigInteger('designation_type_id')->unsigned()->nullable();
            $table->bigInteger('payscale_type_id')->unsigned()->nullable();
            $table->bigInteger('payband_type_id')->unsigned()->nullable();
            $table->string('payscale_number')->nullable();
            $table->string('designation')->unique();
            $table->string('full_name')->nullable();
            $table->bigInteger('group_id')->unsigned()->nullable();
            $table->bigInteger('pay_level_id')->unsigned()->nullable();
            $table->string('order')->nullable();
            $table->string('type')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('designations');
    }
};
