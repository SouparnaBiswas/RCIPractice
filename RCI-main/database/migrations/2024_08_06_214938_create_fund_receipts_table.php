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
        Schema::create('fund_receipts', function (Blueprint $table) {
            $table->id();
            $table->string('receipt_no')->nullable();
            $table->string('payment_type')->nullable();
            $table->string('var_date')->nullable();
            $table->string('form')->nullable();
            $table->string('details')->nullable();
            $table->string('vendor_id')->nullable();
            $table->string('category')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fund_receipts');
    }
};
