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
        Schema::create('receipts', function (Blueprint $table) {
            $table->id();
            $table->string('receipt_no')->nullable();
            $table->enum('receipt_type', ['cash', 'cheque'])->default('cash');
            $table->string('vr_no')->nullable();
            $table->string('vr_date')->nullable();
            $table->string('amount')->nullable();
            $table->string('form')->nullable();
            $table->longText('details')->nullable();
            $table->bigInteger('fund_vendors_id')->nullable();
            $table->string('vendor_name')->nullable();
            $table->bigInteger('category_id')->nullable();
            $table->string('sr_no')->nullable();
            $table->string('desig')->nullable();
            $table->string('bill_ref')->nullable();
            $table->string('bank_acc_no')->nullable();
            $table->string('dv_no')->nullable();
            $table->string('cheque_no')->nullable();
            $table->string('cheque_date')->nullable();
            $table->string('narration')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receipts');
    }
};
