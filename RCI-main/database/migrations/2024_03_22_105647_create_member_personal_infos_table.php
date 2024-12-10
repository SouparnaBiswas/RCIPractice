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
        Schema::create('member_personal_infos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('member_id')->unsigned()->nullable();      
            $table->string('basic')->nullable();
            $table->string('emp_id')->nullable();
            $table->string('name')->nullable();
            $table->string('g_pay')->nullable();
            $table->string('gender')->nullable();
            $table->string('desig')->nullable();
            $table->string('cadre')->nullable();
            $table->string('status')->nullable();
            $table->string('category')->nullable();
            $table->string('dob')->nullable();
            $table->string('doj_lab')->nullable();
            $table->string('doj_service')->nullable();
            $table->string('dop')->nullable();
            $table->string('next_inr')->nullable();
            $table->string('quater')->nullable();
            $table->string('quater_no')->nullable();
            $table->string('fund_type')->nullable();
            $table->string('ex_service')->nullable();
            $table->string('ph')->nullable();
            $table->string('cgegis')->nullable();
            $table->string('cgegis_text')->nullable();
            $table->string('payband')->nullable();
            $table->string('old_basic')->nullable();
            $table->string('pay_stop')->nullable();
            $table->string('pm_level')->nullable();
            $table->string('pm_index')->nullable();
            $table->string('mobile_allowance')->nullable();
            $table->string('broadband_allowance')->nullable();
            $table->string('landline_allowance')->nullable();
            $table->string('cr_water')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member_personal_infos');
    }
};
