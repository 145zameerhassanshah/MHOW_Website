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
        Schema::create('event_extra_fields', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->references('id')->on('events');
            $table->string('field_name');
            $table->string('field_label');
            $table->enum('field_type', ['text', 'textarea', 'select', 'number']);
            $table->text('field_options')->nullable();
            $table->string('placeholder')->nullable();
            $table->boolean('is_required')->default(false);
            $table->integer('order_no')->default(0);
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_extra_fields');
    }
};
