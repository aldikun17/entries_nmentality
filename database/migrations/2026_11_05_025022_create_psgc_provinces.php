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
        Schema::create('psgc_provinces', function (Blueprint $table) {
            $table->id();
            $table->string('psgcCode')->nullable();
            $table->string('provDesc');
            $table->string('provCode')->index(); // e.g. "1339"
            $table->string('regCode')->index();  // Foreign link to region
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('psgc_provinces');
    }
};
