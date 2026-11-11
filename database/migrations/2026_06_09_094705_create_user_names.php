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
        Schema::create('user_names', function (Blueprint $table) {
            $table->id();
            $table->foreignId('name_id')->constrained('user_profiles')->cascadeOnDelete();
            $table->string('first_name', 62);
            $table->string('last_name', 32);
            $table->string('middle_name')->nullable();
            $table->string('suffix', 10)->nullable();
            $table->string('title', 10)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_names');
    }
};
