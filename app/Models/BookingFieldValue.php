<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookingFieldValue extends Model
{
    protected $fillable = ['event_extra_field_id', 'booking_id', 'value'];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    public function eventExtraField()
    {
        return $this->belongsTo(EventExtraField::class);
    }
}
