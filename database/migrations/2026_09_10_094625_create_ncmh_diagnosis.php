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
        Schema::create('ncmh_diagnosis', function (Blueprint $table) {
            $table->id();
            $table->string('icd10_code',100);
            $table->string('diagnosis_name',100);
            $table->string('diagnosis_type',100);
            $table->string('diagnostic_status');
            $table->string('diagnosed_by',100);
            $table->string('diagnosed_at',100);
            $table->string('remarks',100);
            $table->foreignId('encounter_id')->constrained('ncmh_encounters')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ncmh_diagnosis');
    }
};
