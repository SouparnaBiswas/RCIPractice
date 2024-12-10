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
        Schema::create('tptas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pay_level_id');
            $table->string('tpt_type');
            $table->string('tpt_allowance');
            $table->string('tpt_da');
            $table->boolean('status')->default(0)->comment('0=Inactive, 1=Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tptas');
    }
};
