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
        Schema::create('user_client_tokens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profile_id')->constrained('user_profiles')->cascadeOnDelete();
            $table->string('client_id');
            $table->string('plainSecret');
            $table->string('state', 40);
            $table->string('authCode')->nullable();
            $table->string('callback');
            $table->text('redirect')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_client_tokens');
    }
};
