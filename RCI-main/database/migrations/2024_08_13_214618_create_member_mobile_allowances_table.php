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
        Schema::create('member_mobile_allowances', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('member_id')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('landline_number')->nullable();
            $table->string('year')->nullable();
            $table->string('month')->nullable();
            $table->string('landline_allw')->nullable();
            $table->string('mobile_allw')->nullable();
            $table->string('broadband_allw')->nullable();
            $table->string('total_amount')->nullable();
            $table->string('entitlement')->nullable();
            $table->string('amount_claimed')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member_mobile_allowances');
    }
};
