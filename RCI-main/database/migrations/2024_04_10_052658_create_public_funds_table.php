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
        Schema::create('public_funds', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('designation')->nullable();
            $table->string('bill_ref')->nullable();
            $table->string('bank_account')->nullable();
            $table->string('dv_no')->nullable();
            $table->string('narration')->nullable();
            $table->string('category')->nullable();
            $table->string('vr_no')->nullable();
            $table->date('vr_date')->nullable();
            $table->string('sr_no')->nullable();
            $table->string('sr_amount')->nullable();
            $table->string('cheque_no')->nullable();
            $table->date('cheque_date')->nullable();
            $table->string('cheque_amount')->nullable();
            $table->string('cbre_no')->nullable();
            $table->date('cbre_date')->nullable();
            $table->string('cbpe_no')->nullable();
            $table->date('cbpe_date')->nullable();
            $table->string('ct_no')->nullable();
            $table->string('pay_amt')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('public_funds');
    }
};
