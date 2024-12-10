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
        Schema::table('member_personal_infos', function (Blueprint $table) {
            $table->string('e_status')->nullable()->after('pm_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('member_personal_infos', function (Blueprint $table) {
            $table->dropColumn('e_status');
        });
    }
};
