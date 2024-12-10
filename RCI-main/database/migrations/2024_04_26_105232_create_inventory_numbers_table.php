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
        Schema::create('inventory_numbers', function (Blueprint $table) {
            $table->id();
            $table->string('inventory_type')->nullable();
            $table->bigInteger('holder_id')->unsigned()->nullable();  
            $table->bigInteger('group_id')->unsigned()->nullable(); 
            $table->bigInteger('inventory_project_id')->unsigned()->nullable(); 
            $table->string('number')->nullable();
            $table->boolean('status')->default(1)->comment('0=Inactive, 1=Active');
            $table->string('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_numbers');
    }
};
