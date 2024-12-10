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
        Schema::create('tada_category_allowance', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->unsignedInteger('category_id')->nullable();
            $table->string('title')->nullable();
            $table->string('purpose')->nullable();
            $table->float('amount', 10, 2)->default(0.00);
            $table->enum('payment_type', ['onetime', 'perday', 'perkm', 'permonth', 'peryear', 'perweek']);
            $table->tinyInteger('currency')->comment('1=INR, 2=USD');
            $table->tinyInteger('status')->default(1)->comment('1=Active, 0=Inactive');
            $table->timestamps();

            // Optional: Add indexes, foreign keys, etc. as needed
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tada_category_allowance');
    }
};
