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
        Schema::table('events', function (Blueprint $table) {
            $table->string('page_top_text')->nullable();
            $table->string('footer_text_1')->nullable();
            $table->string('footer_text_2')->nullable();
            $table->text('page_form_detail')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn(['page_top_text', 'footer_text_1', 'footer_text_2', 'page_form_detail', 'meta_title', 'meta_keywords', 'meta_description', 'meta_image']);
        });
    }
};
