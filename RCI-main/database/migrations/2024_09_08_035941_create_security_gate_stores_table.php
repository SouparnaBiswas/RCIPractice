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
        Schema::create('security_gate_stores', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('supply_order_id')->nullable();
            $table->bigInteger('vendor_id')->nullable();
            $table->string('entry_time')->nullable();
            $table->string('dc_invoice_bill_voucher_no')->nullable();
            $table->string('dc_invoice_bill_voucher_date')->nullable();
            $table->string('no_of_package')->nullable();
            $table->string('vehicle_no')->nullable();
            $table->text('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('security_gate_stores');
    }
};
