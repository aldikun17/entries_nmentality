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
        Schema::create('ncmh_encounters', function (Blueprint $table) {
            $table->id();
            $table->string('encounter_no',50)->unique();
            $table->dateTime('encounter_date');
            $table->string('encounter_type',50);
            $table->string('service_type',100)->nullable();
            $table->foreignId('patient_id')->constrained('user_profiles')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ncmh_encounters');
    }
};
