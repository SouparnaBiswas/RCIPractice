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
            $table->string('var_incr')->nullable()->after('value');
            $table->string('noi')->nullable()->after('var_incr');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pm_levels', function (Blueprint $table) {
            $table->dropColumn('var_incr');
            $table->dropColumn('noi');
        });
    }
};
