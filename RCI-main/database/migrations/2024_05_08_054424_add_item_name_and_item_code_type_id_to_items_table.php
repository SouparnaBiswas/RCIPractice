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
        Schema::table('item_codes', function (Blueprint $table) {
            $table->string('item_name')->nullable()->after('item_type');
            $table->unsignedBigInteger('item_code_type_id')->nullable()->after('item_name');
            $table->unsignedBigInteger('member_id')->nullable()->after('item_code_type_id');
            $table->date('entry_date')->nullable()->after('member_id');
            $table->string('item_price')->nullable()->after('entry_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('item_codes', function (Blueprint $table) {
            $table->dropColumn('item_name');
            $table->dropColumn('item_code_type_id');
            $table->dropColumn('member_id');
            $table->dropColumn('entry_date');
            $table->dropColumn('item_price');
        });
    }
};
