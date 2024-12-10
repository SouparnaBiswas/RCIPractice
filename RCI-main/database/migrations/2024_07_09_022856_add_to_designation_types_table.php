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
        Schema::table('designation_types', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('section_id')->nullable()->after('designation_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('designation_types', function (Blueprint $table) {
            //
            $table->dropColumn('section_id');
        });
    }
};
