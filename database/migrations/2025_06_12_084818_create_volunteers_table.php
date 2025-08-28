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
        Schema::create('volunteers', function (Blueprint $table) {
            $table->id();
             $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone',30);
            $table->unsignedBigInteger('volunteer_type_id');
            $table->unsignedBigInteger('country_id');
            $table->text('notes')->nullable();
            $table->string('image')->nullable();
                $table->enum('status', ['active', 'inactive'])->default('active');

            //  Foreign key constraints
           $table->foreign('volunteer_type_id')
           ->references('id')
           ->on('volunteer_types')->onDelete('cascade');
            $table->foreign('country_id')
            ->references('id')
            ->on('countries')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('volunteers');
    }
};
