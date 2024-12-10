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
        Schema::table('inventory_projects', function (Blueprint $table) {
            $table->string('project_code')->nullable()->after('id');
            $table->decimal('sanction_amount', 15, 2)->default(0)->nullable()->after('project_name');
            $table->unsignedBigInteger('sanction_authority')->nullable()->after('sanction_amount');
            $table->date('pdc')->nullable()->after('sanction_authority');
            $table->unsignedBigInteger('project_director')->nullable()->after('pdc');
            $table->date('entry_date')->nullable()->after('project_director');
            $table->date('end_date')->nullable()->after('entry_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('inventory_projects', function (Blueprint $table) {
            $table->dropColumn('project_code');
            $table->dropColumn('sanction_amount');
            $table->dropColumn('sanction_authority');
            $table->dropColumn('pdc');
            $table->dropColumn('project_director');
            $table->dropColumn('entry_date');
            $table->dropColumn('end_date');
        });
    }
};
