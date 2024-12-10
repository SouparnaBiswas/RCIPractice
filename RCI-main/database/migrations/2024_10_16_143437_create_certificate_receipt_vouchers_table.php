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
        Schema::create('certificate_receipt_vouchers', function (Blueprint $table) {
            $table->id();
            $table->string('crv_no')->nullable();
            $table->string('crv_date')->nullable();
            $table->string('crac_no')->nullable();
            $table->string('crac_date')->nullable();
            $table->string('received_from')->nullable();
            $table->string('rin_no')->nullable();
            $table->string('rin_date')->nullable();
            $table->string('store_received_date')->nullable();
            $table->string('demand_no')->nullable();
            $table->string('icc_no')->nullable();
            $table->string('division_name')->nullable();
            $table->string('group_name')->nullable();
            $table->string('contract_no')->nullable();
            $table->string('budget_head_details')->nullable();
            $table->string('project_no')->nullable();
            $table->string('project_unit_code')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificate_receipt_vouchers');
    }
};
