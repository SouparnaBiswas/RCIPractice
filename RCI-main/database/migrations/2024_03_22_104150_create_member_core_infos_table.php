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
        Schema::create('member_core_infos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('member_id')->unsigned()->nullable();      
            $table->string('bank_acc_no')->nullable();
            $table->string('ccs_mem_no')->nullable();
            $table->string('fpa')->nullable();
            $table->string('bank')->nullable();
            $table->string('gpf_sub')->nullable();
            $table->string('add2')->nullable();
            $table->string('gpf_acc_no')->nullable();
            $table->string('i_tax')->nullable();
            $table->string('pran_no')->nullable();
            $table->string('pan_no')->nullable();
            $table->string('ecess')->nullable();
            $table->string('ben_acc_no')->nullable();
            $table->string('dcmaf_no')->nullable();
            $table->string('s_pay')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member_core_infos');
    }
};
