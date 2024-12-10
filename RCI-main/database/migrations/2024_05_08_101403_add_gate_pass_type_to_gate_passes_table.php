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
        Schema::table('gate_passes', function (Blueprint $table) {
            $table->string('gate_pass_type')->nullable()->after('gate_pass_date');
            $table->unsignedBigInteger('eiv_no_id')->nullable()->after('gate_pass_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('gate_passes', function (Blueprint $table) {
            $table->dropColumn('gate_pass_type');
            $table->dropColumn('eiv_no_id');
        });
    }
};
