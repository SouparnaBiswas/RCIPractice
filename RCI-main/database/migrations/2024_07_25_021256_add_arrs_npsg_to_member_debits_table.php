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
        Schema::table('member_debits', function (Blueprint $table) {
            $table->string('arrear_pay')->nullable()->after('penal_intr');
            $table->string('npsg')->nullable()->after('arrear_pay');
            $table->string('npsg_arr')->nullable()->after('npsg');
            $table->string('npsg_adj')->nullable()->after('npsg_arr');
            $table->integer('hba_cur_instl')->nullable()->after('hba');
            $table->integer('hba_total_instl')->nullable()->after('hba_cur_instl');
            $table->integer('hba_int_cur_instl')->nullable()->after('hba_int');
            $table->integer('hba_int_total_instl')->nullable()->after('hba_int_cur_instl');
            $table->integer('car_adv_prin_instl')->nullable()->after('car_adv');
            $table->integer('car_adv_total_instl')->nullable()->after('car_adv_prin_instl');
            $table->integer('scot_adv_prin_instl')->nullable()->after('sco_adv');
            $table->integer('scot_adv_total_instl')->nullable();
            $table->integer('sco_adv_int_curr_instl')->nullable()->after('sco_int');
            $table->integer('sco_adv_int_total_instl')->nullable()->after('sco_adv_int_curr_instl');
            $table->integer('comp_prin_curr_instl')->nullable()->after('comp_adv');
            $table->integer('comp_prin_total_instl')->nullable()->after('comp_prin_curr_instl');
            $table->string('comp_adv_int')->nullable()->after('comp_prin_total_instl');
            $table->integer('comp_int_curr_instl')->nullable()->after('comp_adv_int');
            $table->integer('comp_int_total_instl')->nullable()->after('comp_int_curr_instl');
            $table->string('fest_adv_prin_cur')->nullable()->after('fadv');
            $table->string('fest_adv_total_cur')->nullable()->after('fest_adv_prin_cur');
            $table->string('ltc_rec')->nullable()->after('leave_rec');
            $table->string('medical_rec')->nullable()->after('ltc_rec');
            $table->string('tada_rec')->nullable()->after('medical_rec');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('member_debits', function (Blueprint $table) {
            //
            $table->dropColumn('arrear_pay');
            $table->dropColumn('npsg');
            $table->dropColumn('npsg_arr');
            $table->dropColumn('npsg_adj');
            $table->dropColumn('hba_cur_instl');
            $table->dropColumn('hba_total_instl');
            $table->dropColumn('hba_int_cur_instl');
            $table->dropColumn('hba_int_total_instl');
            $table->dropColumn('car_adv_prin_instl');
            $table->dropColumn('car_adv_total_instl');
            $table->dropColumn('scot_adv_prin_instl');
            $table->dropColumn('sco_adv_int_curr_instl');
            $table->dropColumn('sco_adv_int_total_instl');
            $table->dropcolumn('comp_prin_curr_instl');
            $table->dropColumn('comp_prin_total_instl');
            $table->dropColumn('comp_adv_int');
            $table->dropColumn('comp_int_curr_instl');
            $table->dropColumn('comp_int_total_instl');
            $table->dropColumn('fest_adv_prin_cur');
            $table->dropColumn('fest_adv_total_cur');
            $table->dropColumn('ltc_rec');
            $table->dropColumn('medical_rec');
            $table->dropColumn('tada_rec');
        });
    }
};
