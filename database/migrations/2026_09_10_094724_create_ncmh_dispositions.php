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
        Schema::create('ncmh_dispositions', function (Blueprint $table) {
            $table->id();
            $table->string('disposition_type',100);
            $table->date('disposition_date');
            $table->string('referred_to',100);
            $table->string('referred_by',100);
            $table->string('follow_up_date',100);
            $table->string('instructions',100);
            $table->string('admitted',1);
            $table->string('disposition_notes',100);
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
        Schema::dropIfExists('ncmh_dispositions');
    }
};
