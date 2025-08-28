<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('document_requireds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('page_id')->onDelete('cascade');
            $table->string('icon')->nullable();
            $table->string('title');
            $table->text('description');
            $table->integer('order_no')->default(0);
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('document_requireds');
    }
};