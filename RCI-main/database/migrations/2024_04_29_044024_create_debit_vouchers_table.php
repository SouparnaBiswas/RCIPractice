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
        Schema::create('debit_vouchers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('inv_no')->unsigned()->nullable(); 
            $table->string('voucher_no')->nullable();
            $table->date('voucher_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('debit_vouchers');
    }
};
