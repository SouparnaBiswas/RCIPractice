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
        Schema::table('member_credits', function (Blueprint $table) {
            //
            $table->integer('landline_allow')->nullable()->after('risk_alw');
            $table->integer('mobile_allow')->nullable()->after('landline_allow');
            $table->integer('broad_band_allow')->nullable()->after('mobile_allow');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('member_credits', function (Blueprint $table) {
            //
            $table->dropColumn('landline_allow');
            $table->dropColumn('mobile_allow');
            $table->dropColumn('broad_band_allow');
        });
    }
};
