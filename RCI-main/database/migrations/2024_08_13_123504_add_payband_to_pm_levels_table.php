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
        Schema::table('pm_levels', function (Blueprint $table) {
            $table->unsignedBigInteger('payband')->nullable()->after('id');
            $table->string('entry_pay')->nullable()->after('payband');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pm_levels', function (Blueprint $table) {
            $table->dropColumn('payband');
            $table->dropColumn('entry_pay');
        });
    }
};
