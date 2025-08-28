<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{

      protected $fillable = [
        'event_id',
        'name',
        'email',
        'phone_no',
        'gender',
        'source',
        'event_type',
        'amount',
        'ticket_title',
        'ticket_quantity',
        'event_ticket_id',
        'payment_method',
        'payment_status',
        'transaction_id',
        'event_schedule_id',
        'schedule_title',
        'country'
    ];
    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function bookingFieldValues()
    {
        return $this->hasMany(BookingFieldValue::class);
    }
}
