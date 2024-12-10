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
        Schema::create('rules', function (Blueprint $table) {
            $table->id();
            $table->string('rule_name')->nullable();
            $table->string('month')->nullable();
            $table->string('year')->nullable();
            $table->string('f_basic')->nullable();
            $table->string('t_basic')->nullable();
            $table->string('percent')->nullable();
            $table->string('amount')->nullable();
            $table->string('f_gross')->nullable();
            $table->string('t_gross')->nullable();
            $table->string('f_scale')->nullable();
            $table->string('t_scale')->nullable();
            $table->string('more_info')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rules');
    }
};
