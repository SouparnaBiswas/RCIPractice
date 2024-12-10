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
        Schema::create('tada_advance', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->unsignedInteger('project_id')->nullable();
            $table->unsignedInteger('member_id')->nullable();
            $table->string('bill_no')->nullable();
            $table->string('toplist_no')->nullable();
            $table->date('bill_date')->nullable();
            $table->dateTime('dept_date')->nullable();
            $table->float('amount_requested', 10, 2)->default(0.00);
            $table->float('amount_allowed', 10, 2)->default(0.00);
            $table->float('amount_disallowed', 10, 2)->nullable();
            $table->float('claim_amount', 10, 2)->default(0.00);
            $table->float('pass_amount', 10, 2)->default(0.00);
            $table->string('mro')->nullable();
            $table->float('due_amount', 10, 2)->nullable();
            $table->tinyInteger('status')->comment('0=Pending, 1=Accepted');
            $table->timestamps(); // Handles created_at and updated_at fields

            // Optional: Add indexes, foreign keys, etc. as needed
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tada_advance');
    }
};
