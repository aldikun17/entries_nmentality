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
        Schema::create('psgc_cities', function (Blueprint $table) {
            $table->id();
            $table->string('psgcCode')->nullable();
            $table->string('citymunDesc');
            $table->string('citymunCode')->index(); // e.g. "133901"
            $table->string('provCode')->index();    // Foreign link to province
            $table->string('regCode')->index();     // Foreign link to region
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('psgc_cities');
    }
};
