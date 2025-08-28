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
        Schema::create('old_tours', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('page_id')->nullable();
            $table->string('title', 255);
            $table->string('event', 255);
            $table->string('first_name', 255);
            $table->string('surname', 255);
            $table->string('age', 10)->nullable();
            $table->string('fitness_level', 50)->nullable();
            $table->string('experience', 50)->nullable();
            $table->string('health', 50)->nullable();
            $table->string('phone', 255)->nullable();
            $table->string('email', 255);
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->string('referral_source', 255)->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('event_id')->nullable();

            $table->index('page_id');
            $table->index('event_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('old_tours');
    }
};
