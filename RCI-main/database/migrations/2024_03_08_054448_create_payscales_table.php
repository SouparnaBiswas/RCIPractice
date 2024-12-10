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
        Schema::create('payscales', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('payscale_type_id')->unsigned()->nullable();
            $table->string('payscale_number')->unique();
            $table->string('basic1')->nullable();
            $table->string('basic2')->nullable();
            $table->string('basic3')->nullable();
            $table->string('increment1')->nullable();
            $table->string('increment2')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payscales');
    }
};
