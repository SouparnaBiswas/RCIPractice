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
        Schema::create('pension_rates', function (Blueprint $table) {
            $table->id();
            $table->string('npsc_credit_rate')->nullable();
            $table->string('npsg_credit_rate')->nullable();
            $table->string('npsc_debit_rate')->nullable();
            $table->string('npsg_debit_rate')->nullable();
            $table->string('year')->nullable();
            $table->boolean('status')->default(0)->comment('0=Inactive, 1=Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pension_rates');
    }
};
