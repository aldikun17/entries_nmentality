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
        Schema::create('ncmh_assessments', function (Blueprint $table) {
            $table->id();
            $table->string('assessment',100);
            $table->string('risk_level',50);
            $table->string('suicide_risk',50);
            $table->string('violence_risk',50);
            $table->string('functional_status',100);
            $table->string('assessed_by',100);
            $table->string('assessed_at',100);
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
        Schema::dropIfExists('ncmh_assessments');
    }
};
