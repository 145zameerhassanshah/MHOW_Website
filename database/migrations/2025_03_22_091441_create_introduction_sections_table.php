<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('introduction_sections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('page_id')->onDelete('cascade');
            // $table->enum('type', ['single_image','double_image','tripple_image']);
            $table->string('title');                              // {"en": "About Our VAT Services", "ar": "حول خدمات ضريبة القيمة المضافة"}
            $table->string('subtitle')->nullable();               // {"en": "Expert Guidance", "ar": "إرشاد خبير"}
            $table->text('description')->nullable();            // {"en": "We offer...", "ar": "نحن نقدم..."}
            $table->string('images')->nullable();              // {"en": "We offer...", "ar": "نحن نقدم..."}
            $table->string('icon')->nullable();              // Stores paths to images as an array, e.g., ["image1.jpg", "image2.jpg"]
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('introduction_sections');
    }
};