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
        Schema::create('gate_passes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('item_code_id')->unsigned()->nullable();
            $table->bigInteger('invoice_no')->unsigned()->nullable();
            $table->string('gate_pass_no')->nullable();
            $table->date('gate_pass_date')->nullable();
            $table->date('date_of_return')->nullable();
            $table->bigInteger('consignee_id')->unsigned()->nullable();
            $table->string('consignee_name')->nullable();
            $table->string('consignee_phone')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gate_passes');
    }
};
