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
        Schema::create('donor_emails', function (Blueprint $table) {
            $table->id();
            $table->foreignId('donor_id')->constrained()->onDelete('cascade'); // Reference to donor
            $table->foreignId('template_id')->nullable()->constrained('email_templates')->onDelete('set null'); // Link to email template
            $table->string('subject'); // Subject of the email
            $table->text('body'); // Final rendered message (can include dynamic values like donor's name)
            $table->json('attachment_paths')->nullable(); // Store multiple attachment paths as JSON
            $table->timestamp('sent_at')->nullable(); // When the email was sent
            $table->enum('status', ['pending', 'sent', 'failed'])->default('pending'); // Email status
            $table->foreignId('sent_by')->nullable()->constrained('users')->onDelete('set null'); // Who sent the email
            $table->timestamps(); // Created and updated timestamps
            $table->softDeletes(); // Soft delete to track deleted records

            // Audit fields
            $table->foreignId('created_by')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('updated_by')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('deleted_by')->nullable()->constrained('users')->onDelete('set null');
            });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donar_emails');
    }
};
