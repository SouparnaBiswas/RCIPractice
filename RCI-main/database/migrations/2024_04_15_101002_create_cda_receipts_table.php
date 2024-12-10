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
        Schema::create('cda_receipts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('details')->unsigned()->nullable();
            $table->string('voucher_no')->nullable();
            $table->string('voucher_date')->nullable();
            $table->string('dv_date')->nullable();
            $table->string('amount')->nullable();
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cda_receipts');
    }
};
