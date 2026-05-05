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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('title1');
            $table->text('description1');

            $table->string('img_url')->nullable();

            $table->string('title2')->nullable();
            $table->text('description2')->nullable();

            $table->json('technical')->nullable();      // array of strings
            $table->json('key_services')->nullable();   // array of strings
            $table->json('how_we_work')->nullable();    // array of {title, description}
            $table->json('benefits')->nullable();       // array of strings
            $table->json('technologies')->nullable();   // array of strings

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
