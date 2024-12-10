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
        Schema::create('conversion_vouchers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('inv_no')->unsigned()->nullable(); 
            $table->bigInteger('item_id')->unsigned()->nullable(); 
            $table->string('quantity')->nullable();
            $table->string('voucher_no')->nullable();
            $table->date('voucher_date')->nullable();
            $table->string('voucher_type')->nullable();
            $table->string('transfer_voucher_number')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conversion_vouchers');
    }
};
