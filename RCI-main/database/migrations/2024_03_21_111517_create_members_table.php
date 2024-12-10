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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('pers_no')->nullable();
            $table->string('emp_id')->nullable();
            $table->string('gender')->nullable();
            $table->string('name')->nullable();
            $table->bigInteger('pm_level')->unsigned()->nullable();
            $table->bigInteger('pm_index')->unsigned()->nullable();
            $table->string('basic')->nullable();
            $table->bigInteger('desig')->unsigned()->nullable();
            $table->bigInteger('division')->unsigned()->nullable();
            $table->bigInteger('group')->unsigned()->nullable();
            $table->bigInteger('cadre')->unsigned()->nullable();
            $table->bigInteger('category')->nullable();
            $table->string('status')->nullable();
            $table->string('old_bp')->nullable();
            $table->string('g_pay')->nullable();
            $table->bigInteger('pay_band')->unsigned()->nullable();
            $table->string('fund_type')->nullable();
            $table->date('dob')->nullable();
            $table->string('doj_lab')->nullable();
            $table->string('doj_service1')->nullable();
            $table->string('dop')->nullable();
            $table->string('next_inr')->nullable();
            $table->bigInteger('quater')->unsigned()->nullable();
            $table->string('quater_no')->nullable();
            $table->string('doj_service2')->nullable();
            $table->string('cgeis')->nullable();
            $table->bigInteger('ex_service')->unsigned()->nullable();
            $table->bigInteger('pg')->unsigned()->nullable();
            $table->bigInteger('cgegis')->unsigned()->nullable();
            $table->string('pay_stop')->nullable();
            $table->string('pis')->nullable();
            $table->string('pis_address')->nullable();
            $table->string('sos')->nullable();
            $table->string('sos_address')->nullable();
            $table->string('member_city')->nullable();
            $table->string('rent_or_not')->nullable();
            $table->string('pran_number')->nullable();
            $table->boolean('member_status')->default(1)->comment('0=Inactive, 1=Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
