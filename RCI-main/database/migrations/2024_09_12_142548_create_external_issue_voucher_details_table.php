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
        Schema::create('external_issue_voucher_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('external_issue_voucher_id')->nullable();
            $table->unsignedBigInteger('item_id')->nullable();
            $table->string('description')->nullable();
            $table->string('au_status')->nullable();
            $table->string('unit_price')->nullable();
            $table->string('quantity')->nullable();
            $table->string('total_cost')->nullable();
            $table->longText('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('external_issue_voucher_details');
    }
};
