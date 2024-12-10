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
        Schema::create('member_child_allowances', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('member_id')->nullable();
            $table->string('year')->nullable();
            $table->unsignedInteger('child_id')->nullable();
            $table->string('child_name')->nullable();
            $table->string('child_dob')->nullable();
            $table->string('child_school')->nullable();
            $table->string('child_class')->nullable();
            $table->string('academic_year')->nullable();
            $table->string('allowance_amount')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member_child_allowances');
    }
};
