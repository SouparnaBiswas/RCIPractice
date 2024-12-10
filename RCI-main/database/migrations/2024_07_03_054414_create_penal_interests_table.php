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
        Schema::create('penal_interests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('member_id')->nullable();
            $table->unsignedBigInteger('loan_id')->nullable();
            $table->decimal('penal_interest', 10, 2)->nullable();
            $table->decimal('principal_amount', 10, 2)->nullable();
            $table->string('no_of_days')->nullable();
            $table->string('year')->nullable();
            $table->string('month')->nullable();
            $table->boolean('status')->default(0)->comment('0=Inactive, 1=Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penal_interests');
    }
};
