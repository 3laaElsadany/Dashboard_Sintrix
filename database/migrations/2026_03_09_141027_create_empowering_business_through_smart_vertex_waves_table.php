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
        Schema::create('empowering_business_through_smart_vertex_waves', function (Blueprint $table) {
            $table->id();
            // Progress Bars (Percentages)
            $table->integer('efficiency_rate');
            $table->integer('performance_rate');
            $table->integer('innovation_rate');

            // Stats Counters (Strings to allow + or % signs)
            $table->string('active_clients');
            $table->string('client_satisfaction');
            $table->string('industries_served');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empowering_business_through_smart_vertex_waves');
    }
};
