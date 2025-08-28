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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('sub_title')->nullable();
            $table->enum('event_type', ['free', 'paid']);
            $table->string('slug')->unique();
            $table->text('description');
            $table->integer('order_no')->default(0);
            $table->text('event_detail');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->string('venue')->nullable();
            $table->string('location')->nullable();
            $table->string('contact_no', 20)->nullable();
            $table->string('email')->nullable();
            $table->string('image')->nullable();
            $table->string('banner_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
