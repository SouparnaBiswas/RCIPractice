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
        Schema::create('certificate_issue_voucher_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('certicate_issue_voucher_id')->nullable();
            $table->unsignedBigInteger('item_code')->nullable();
            $table->string('price')->nullable();
            $table->string('description')->nullable();
            $table->string('quantity')->nullable();
            $table->string('total_price')->nullable();
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
        Schema::dropIfExists('certificate_issue_voucher_details');
    }
};
