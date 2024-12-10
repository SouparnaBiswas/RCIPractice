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
        Schema::create('quaters', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('grade_pay_id')->unsigned()->nullable();
            $table->string('license_fee')->nullable();
            $table->string('qrt_type')->nullable();    
            $table->string('qrt_charge')->nullable();      
            $table->boolean('status')->default(0)->comment('0=Inactive, 1=Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */ 
    public function down(): void
    {
        Schema::dropIfExists('quaters');
    }
};
