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
        Schema::create('member_loan_infos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('member_id')->unsigned()->nullable();      
            $table->bigInteger('loan_id')->unsigned()->nullable();
            $table->string('loan_name')->nullable();
            $table->string('present_inst_no')->nullable();
            $table->string('tot_no_of_inst')->nullable();
            $table->string('inst_amount')->nullable();
            $table->string('inst_rate')->nullable();
            $table->string('total_amount')->nullable();
            $table->string('balance')->nullable();
            $table->string('penal_inst_rate')->nullable(); 
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->longText('remark')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member_loan_infos');
    }
};
