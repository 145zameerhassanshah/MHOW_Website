<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('faqs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('page_id')->onDelete('cascade');  // Relating to a group
            $table->json('question');                  // {"en": "What is the process?", "ar": "ما هي العملية؟"}
            $table->json('answer');                    // {"en": "The process is simple...", "ar": "العملية بسيطة..."}
            $table->integer('order_no')->default(0);   // Order for sorting FAQs
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('faqs');
    }
};