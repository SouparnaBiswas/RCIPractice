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
        Schema::create('gate_pass_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('gate_pass_id')->nullable();
            $table->unsignedInteger('item_id')->nullable();
            $table->string('description')->nullable();
            $table->string('unit_cost')->nullable();
            $table->string('quantity')->nullable();
            $table->string('total_cost')->nullable();
            $table->string('au_status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gate_pass_items');
    }
};
