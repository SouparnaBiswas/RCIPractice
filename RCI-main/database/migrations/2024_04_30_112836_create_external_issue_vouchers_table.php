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
        Schema::create('external_issue_vouchers', function (Blueprint $table) {
            $table->id();
            $table->string('voucher_no')->nullable();
            $table->bigInteger('vendor_id')->unsigned()->nullable();
            $table->string('other_consignee_name')->nullable();
            $table->string('other_consignee_number')->nullable();
            $table->date('voucher_date')->nullable();
            $table->bigInteger('inv_no')->unsigned()->nullable();
            $table->longText('authority_of_issue')->nullable();
            $table->bigInteger('item_id')->unsigned()->nullable();
            $table->string('item_unit_price')->nullable();
            $table->string('quantity')->nullable();
            $table->string('total_price')->nullable();
            $table->bigInteger('gate_pass_id')->unsigned()->nullable();
            $table->string('au_status')->nullable();
            $table->string('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('external_issue_vouchers');
    }
};
