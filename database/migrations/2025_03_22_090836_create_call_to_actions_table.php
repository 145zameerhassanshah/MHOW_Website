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
        Schema::create('call_to_actions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('page_id')->onDelete('cascade');  // Relating to a group
            $table->string('title');                     // {"en": "Get in Touch", "ar": "تواصل معنا"}
            $table->string('subtitle')->nullable();      // {"en": "We are here to assist you", "ar": "نحن هنا لمساعدتك"}
            $table->string('button_text');               // {"en": "Contact Us", "ar": "اتصل بنا"}
            $table->string('button_link');             // URL to redirect on button click
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('call_to_actions');
    }
};
