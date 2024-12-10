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
        Schema::create('certificate_issue_vouchers', function (Blueprint $table) {
            $table->id();
            $table->string('voucher_no')->nullable();
            $table->string('voucher_date')->nullable();
            $table->unsignedBigInteger('inv_no')->nullable();
            $table->string('inventory_holder')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificate_issue_vouchers');
    }
};
