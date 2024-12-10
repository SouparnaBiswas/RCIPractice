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
        Schema::create('pensions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('pran_no')->nullable();
            $table->string('npsc_sub_amt')->nullable();
            $table->string('npsg_sub_amt')->nullable();
            $table->string('npsc_eol_credit_amt')->nullable();
            $table->string('npsg_eol_credit_amt')->nullable();
            $table->string('npsc_eol_deduction_amt')->nullable();
            $table->string('npsg_eol_deduction_amt')->nullable();
            $table->string('npsc_hpl_amt')->nullable();
            $table->string('npsg_hpl_amt')->nullable();
            $table->string('year')->nullable();
            $table->string('month')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pensions');
    }
};
