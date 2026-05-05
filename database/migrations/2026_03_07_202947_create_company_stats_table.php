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
        Schema::create('company_stats', function (Blueprint $table) {
            $table->id();
            $table->string('video_link')->nullable();
            $table->integer('projects_complete')->nullable();
            $table->integer('years_of_experience')->default(0);
            $table->integer('team_members')->default(0);
            $table->integer('total_awards')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_stats');
    }
};
