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
        Schema::create('event_email_templates', function (Blueprint $table) {
           $table->id();
            $table->string('title'); // e.g., “Thank You Email”, “Year-End Campaign”
            $table->string('subject');
            $table->longText('body'); // Can use placeholders like {{name}}, {{amount}}, etc.
            $table->enum('status', ['draft', 'active'])->default('draft');
            $table->foreignId('event_id')->references('id')->on('events');

            // Audit fields
            $table->foreignId('created_by')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('updated_by')->nullable()->constrained('users')->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_email_templates');
    }
};
