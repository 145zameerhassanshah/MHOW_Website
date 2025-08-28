<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('section_titles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('page_id')->onDelete('cascade');
            $table->enum('type', [
                'testimonial',
                'faq',
                'feature',
                'procedure',
                'why_choose_us',
                'document',
                'feature_image',
                'hero_section',
                'intro_section',
                'why_us_image',
                'call_to_action',
                'residency-visa',
                'element'
            ]);
            $table->string('title');           // {"en": "Our Services", "ar": "خدماتنا"}
            $table->string('subtitle')->nullable();
            $table->text('description')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('section_titles');
    }
};