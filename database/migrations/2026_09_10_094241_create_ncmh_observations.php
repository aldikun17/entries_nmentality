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
        Schema::create('ncmh_observations', function (Blueprint $table) {
            $table->id();
            $table->string('observation_type',100);
            $table->string('observation_value',100);
            $table->string('unit',100);
            $table->date('observation_date');
            $table->string('observed_by',100);
            $table->string('observed_behavior',100);
            $table->string('observed_physical',100);
            $table->string('observed_progess',100);
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
        Schema::dropIfExists('ncmh_observations');
    }
};
