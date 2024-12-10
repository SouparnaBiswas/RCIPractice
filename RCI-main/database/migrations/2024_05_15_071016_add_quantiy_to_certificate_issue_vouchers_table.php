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
        Schema::table('certificate_issue_vouchers', function (Blueprint $table) {
            $table->string('quantity')->nullable();
            $table->string('total_price')->after('quantity')->nullable();
            $table->string('au_status')->after('total_price')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('certificate_issue_vouchers', function (Blueprint $table) {
            $table->dropColumn('quantity');
            $table->dropColumn('total_price');
            $table->dropColumn('au_status');
        });
    }
};
