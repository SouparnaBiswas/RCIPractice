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
        Schema::table('cda_receipts', function (Blueprint $table) {
            //
            $table->string('cheq_no')->nullable()->after('dv_date');
            $table->string('cheq_date')->nullable()->after('cheq_no');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cda_receipts', function (Blueprint $table) {
            //
            $table->dropColumn('cheq_no');
            $table->dropColumn('cheq_date');
        });
    }
};
