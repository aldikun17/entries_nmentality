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
        Schema::create('user_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('info_id')->constrained('user_profiles')->cascadeOnDelete();
            $table->date('dob');
            $table->unsignedTinyInteger('age');
            $table->string('gender', 10);
            $table->string('civil_status', 10);
            $table->string('occupation')->nullable();
            $table->string('education')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_infos');
    }
};
