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
        Schema::create('member_loans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('member_id')->unsigned()->nullable();
            $table->bigInteger('loan_id')->unsigned()->nullable();
            $table->string('interest_rate')->nullable();
            $table->string('emi_amount')->nullable();
            $table->string('interest_amount')->nullable();
            $table->string('penal_interest')->nullable();
            $table->string('emi_month')->nullable();
            $table->string('emi_date')->nullable();
            $table->boolean('status')->default(0)->comment('1=paid, 0=due');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member_loans');
    }
};
