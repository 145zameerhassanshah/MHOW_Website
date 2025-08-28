<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('block_galleries', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->integer('order_no')->default(0);
            $table->foreignId('block_id')->constrained('blocks')->onDelete('cascade');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('block_galleries', function (Blueprint $table) {
            $table->dropTable('block_galleries');
        });
    }
};
