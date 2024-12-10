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
        Schema::create('advance_settlement_bills', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('advance_settlement_id')->unsigned()->nullable();  
            $table->string('firm')->nullable();
            $table->string('bill_amount')->nullable();
            $table->string('balance')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('advance_settlement_bills');
    }
};
