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
        Schema::create('pay_matrix_basics', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pay_matrix_row_id')->nullable();
            $table->unsignedBigInteger('pm_level_id')->nullable();
            $table->string('basic_pay')->nullable();
            $table->boolean('status')->default(0)->comment('0=Inactive, 1=Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pay_matrix_basics');
    }
};
