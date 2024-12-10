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
        Schema::create('member_original_recoveries', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('member_id')->unsigned()->nullable();      
            $table->string('ccs_sub')->nullable();
            $table->string('mess')->nullable();
            $table->string('security')->nullable();
            $table->string('misc1')->nullable();
            $table->string('ccs_rec')->nullable();
            $table->string('asso_fee')->nullable();
            $table->string('dbf')->nullable();
            $table->string('misc2')->nullable();
            $table->string('wel_sub')->nullable();
            $table->string('ben')->nullable();
            $table->string('med_ins')->nullable();
            $table->string('tot_rec')->nullable();
            $table->string('wel_rec')->nullable();
            $table->string('hdfc')->nullable();
            $table->string('maf')->nullable();
            $table->string('final_pay')->nullable();
            $table->string('lic')->nullable();
            $table->string('cort_atch')->nullable();
            $table->string('ogpf')->nullable();
            $table->string('ntp')->nullable();
            $table->longText('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member_original_recoveries');
    }
};
