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
        Schema::table('members', function (Blueprint $table) {
            //
            $table->string('adhar_number')->nullable()->after('doj_service1');
            $table->string('gpf_number')->nullable()->after('adhar_number');
            $table->string('app_date')->nullable()->after('gpf_number');
            $table->string('nps_available')->nullable()->after('app_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('members', function (Blueprint $table) {
            //
            $table->dropColumn('adhar_number');
            $table->dropColumn('gpf_number');
            $table->dropColumn('app_date');
            $table->dropColumn('nps_available');
        });
    }
};
