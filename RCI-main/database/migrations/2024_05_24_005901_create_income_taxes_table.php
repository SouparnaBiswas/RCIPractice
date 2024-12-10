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
        Schema::create('income_taxes', function (Blueprint $table) {
            $table->id();
            $table->string('higher_slab_amount')->nullable();
            $table->string('lower_slab_amount')->nullable();
            $table->string('tax_rate')->nullable();
            $table->string('regime')->nullable();
            $table->string('edu_cess_rate')->nullable();
            $table->string('financial_year')->nullable();
            $table->date('record_add_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('income_taxes');
    }
};
