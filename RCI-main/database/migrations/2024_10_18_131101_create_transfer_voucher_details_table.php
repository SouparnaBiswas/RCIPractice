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
        Schema::create('transfer_voucher_details', function (Blueprint $table) {
            $table->id();
            $table->string('transfer_voucher_id')->nullable();
            $table->string('strike_ledger_no')->nullable();
            $table->string('strike_nomenclature')->nullable();
            $table->string('strike_quantity')->nullable();
            $table->string('strike_rate')->nullable();
            $table->string('brought_ledger_no')->nullable();
            $table->string('brought_nomenclature')->nullable();
            $table->string('brought_quantity')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transfer_voucher_details');
    }
};
