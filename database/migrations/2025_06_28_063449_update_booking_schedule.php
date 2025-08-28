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
        Schema::table('bookings', function (Blueprint $table) {
            $table->string('schedule_title')->nullable()->after('event_ticket_id');
            $table->foreignId('event_schedule_id')->nullable()->constrained('event_schedules')->after('schedule_title');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropForeign('event_schedule_id');
            $table->dropColumn(['schedule_title', 'event_schedule_id']);
        });
    }
};
