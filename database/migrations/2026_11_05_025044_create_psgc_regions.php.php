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
        Schema::create('psgc_regions', function (Blueprint $table) {
            $table->id();
            $table->string('psgcCode')->nullable();
            $table->string('psgc_region')->nullable();
            $table->string('regDesc');
            $table->string('regCode')->index(); // e.g. "13"
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('psgc_regions');
    }
};
