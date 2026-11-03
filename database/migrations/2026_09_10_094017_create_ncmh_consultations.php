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
        Schema::create('ncmh_consultations', function (Blueprint $table) {
            $table->id();
            $table->date('date_consultation');
            $table->string('chief_complaint',100)->nullable();
            $table->string('history_present',100)->nullable();
            $table->string('history_past',100)->nullable();
            $table->string('family_history',100)->nullable();
            $table->string('social_history',100)->nullable();
            $table->string('remarks',100)->nullable();
            $table->foreignId('encounter_id')->constrained('ncmh_encounters')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ncmh_consultations');
    }
};
