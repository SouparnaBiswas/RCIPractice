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
        Schema::create('store_inwards', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('supply_order_id')->nullable();
            $table->bigInteger('vendor_id')->nullable();
            $table->string('tcr_number')->nullable();
            $table->string('dc_invoice_bill_voucher_no')->nullable();
            $table->string('dc_invoice_bill_voucher_date')->nullable();
            $table->string('rin_no')->nullable();
            $table->string('rin_date')->nullable();
            $table->string('qty_received')->nullable();
            $table->string('date_of_receipt')->nullable();
            $table->text('nomenclature')->nullable();
            $table->text('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('store_inwards');
    }
};
