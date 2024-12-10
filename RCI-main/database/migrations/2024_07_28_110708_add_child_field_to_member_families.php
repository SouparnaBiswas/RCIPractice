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
        Schema::table('member_families', function (Blueprint $table) {
            //
            $table->string('child1_class')->nullable()->after('work_status');
            $table->string('child1_academic_yr')->nullable()->after('child1_class');
            $table->string('child1_amount')->nullable()->after('child1_academic_yr');

            $table->string('child2_class')->nullable()->after('child1_academic_yr');
            $table->string('child2_academic_yr')->nullable()->after('child2_class');
            $table->string('child2_amount')->nullable()->after('child2_academic_yr');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('member_families', function (Blueprint $table) {
            //
            $table->dropColumn('child1_class');
            $table->dropColumn('child1_academic_yr');
            $table->dropColumn('child1_amount');
            $table->dropColumn('child2_class');
            $table->dropColumn('child2_academic_yr');
            $table->dropColumn('child2_amount');
        });
    }
};
