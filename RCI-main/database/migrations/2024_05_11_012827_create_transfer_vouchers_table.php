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
        Schema::create('transfer_vouchers', function (Blueprint $table) {
            $table->id();
            $table->string('voucher_no')->nullable();
            $table->date('voucher_date')->nullable();
            $table->string('from_inv_number')->nullable();
            $table->string('to_inv_number')->nullable();
            $table->string('item_id')->nullable(); 
            $table->string('quantity')->nullable();
            $table->string('issuing_division')->nullable();
            $table->string('issuing_icc_no')->nullable();
            $table->string('receiving_division')->nullable();
            $table->string('receiving_icc_no')->nullable();
            $table->string('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transfer_vouchers');
    }
};
