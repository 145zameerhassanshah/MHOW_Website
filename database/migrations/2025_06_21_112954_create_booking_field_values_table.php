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
        Schema::create('booking_field_values', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_extra_field_id')->references('id')->on('event_extra_fields');
            $table->foreignId('booking_id')->references('id')->on('bookings');
            $table->string('value');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_field_values');
    }
};
