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
        Schema::create('dearness_allowance_percentages', function (Blueprint $table) {
            $table->id();
            $table->string('financial_year');
            $table->string('quarter');
            $table->decimal('percentage', 5, 2);
            $table->unsignedBigInteger('pay_commission_id');
            $table->string('year')->nullable();
            $table->string('month')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dearness_allowance_percentages');
    }
};
