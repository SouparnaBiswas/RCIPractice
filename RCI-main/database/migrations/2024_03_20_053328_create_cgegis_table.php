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
        Schema::create('cgegis', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('group_id')->unsigned()->nullable();
            $table->string('value')->nullable();
            $table->boolean('status')->default(0)->comment('0=Inactive, 1=Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cgegis');
    }
};
