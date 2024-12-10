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
        Schema::create('traffic_controls', function (Blueprint $table) {
            $table->id();
            // tcr_number
            $table->string('tcr_number')->nullable();
            $table->bigInteger('supply_order_id')->nullable();
            $table->bigInteger('vendor_id')->nullable();
            $table->bigInteger('transport_id')->nullable();

            $table->string('lr_rr_awb_bl_app_rpp_number')->nullable();
            $table->date('lr_rr_awb_bl_app_rpp_date')->nullable();

            $table->string('contract_no')->nullable();
            $table->string('authority_and_date')->nullable();

            $table->string('date_of_collection_of_stores')->nullable();
            $table->string('no_of_package')->nullable();
            $table->string('gross_weight')->nullable();
            $table->string('condition_of_package')->nullable();
            $table->string('amount')->nullable();
            $table->text('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('traffic_controls');
    }
};
