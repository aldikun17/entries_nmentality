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
        Schema::create('user_address', function (Blueprint $table) {
            $table->id();
            $table->foreignId('address_id')->constrained('user_profiles')->cascadeOnDelete();
            $table->string('psgc_region_id');
            $table->string('psgc_prov_id');
            $table->string('psgc_city_id');
            $table->string('psgc_barangay_id');
            $table->string('full_address');
            $table->timestamps();
        });
    }    //address_id, psgc_region_id, psgc_prov_id, psgc_city_id, psgc_barangay_id, full_address

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_address');
    }
};
