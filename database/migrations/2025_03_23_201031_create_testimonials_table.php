<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('page_id')->onDelete('cascade');  // Relating to a group
            $table->string('name');
            $table->string('feedback');                           // {"en": "Great service!", "ar": "خدمة رائعة!"}
            $table->string('designation')->nullable();
            $table->integer('order_no')->default(0);            // Order for sorting testimonials
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};