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
        Schema::create('inventory_loans', function (Blueprint $table) {
            $table->id();
            $table->string('date_of_issue')->nullable();
            $table->string('icc_no')->nullable();
            $table->string('item_code')->nullable();
            $table->string('nomenclature')->nullable();
            $table->string('unit_price')->nullable();
            $table->string('quantity_issue')->nullable();
            $table->string('cost')->nullable();
            $table->string('name_of_borrower')->nullable();
            $table->string('signature_of_issue')->nullable();
            $table->string('date_of_return')->nullable();
            $table->string('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_loans');
    }
};
