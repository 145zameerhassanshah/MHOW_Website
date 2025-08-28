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
        Schema::create('email_attachments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('template_id')->constrained('email_templates')->onDelete('cascade'); // Link to email template
            $table->string('file_name'); // Name of the file for easier reference
            $table->string('file_path'); // Path to the attachment file
            $table->string('file_type'); // MIME type (image/jpeg, application/pdf, etc.)
            $table->timestamps(); // Created and updated timestamps
            $table->softDeletes(); // Soft delete to track deletions
            });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('email_attachments');
    }
};
