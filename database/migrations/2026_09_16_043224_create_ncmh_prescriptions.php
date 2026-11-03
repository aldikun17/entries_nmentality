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
        Schema::create('ncmh_prescriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('encounter_id')->constrained('ncmh_encounters')->cascadeOnDelete();
            $table->string('prescription',100);
            $table->date('date_prescribed',100);
            $table->string('remarks',100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ncmh_prescriptions');
    }
};
