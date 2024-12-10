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
        Schema::table('cda_bill_audit_teams', function (Blueprint $table) {
            $table->string('pc_no')->nullable()->after('adv_amount');
            $table->string('firm_name')->nullable()->after('crv_no');
            $table->string('cda_bill_no')->nullable()->after('firm_name');
            $table->string('cda_bill_date')->nullable()->after('cda_bill_no');
            $table->string('cda_bill_amount')->nullable()->after('cda_bill_no');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cda_bill_audit_teams', function (Blueprint $table) {
            //
            $table->dropColumn('pc_no');
            $table->dropColumn('firm_name');
            $table->dropColumn('cda_bill_no');
            $table->dropColumn('cda_bill_date');
            $table->dropColumn('cda_bill_amount');
        });
    }
};
