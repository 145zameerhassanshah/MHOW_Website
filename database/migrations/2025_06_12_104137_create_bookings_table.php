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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone_no');
            $table->enum('gender', ['male', 'female', 'other'])->nullable();

            $table->unsignedBigInteger('event_id');
            $table->string('event_type');
            $table->decimal('amount', 10, 2)->default(0.00);
            $table->string('ticket_title')->nullable();
            $table->integer('ticket_quantity')->nullable();
            $table->foreignId('event_ticket_id')->nullable()->references('id')->on('event_tickets');

            $table->date('transaction_date')->nullable();
            $table->string('transaction_id')->unique()->nullable();
            $table->string('payment_method')->nullable();

            $table->unsignedBigInteger('campaign_id')->nullable();
            $table->unsignedBigInteger('donation_form_id')->nullable();

            $table->timestamps();

            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
            $table->foreign('campaign_id')->references('id')->on('campaigns')->onDelete('set null');
            $table->foreign('donation_form_id')->references('id')->on('donation_forms')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
