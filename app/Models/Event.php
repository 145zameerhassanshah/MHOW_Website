<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title',
        'sub_title',
        'event_type',
        'page_type',
        'show_countries',
        'slug',
        'description',
        'order_no',
        'event_detail',
        'status',
        'start_date',
        'end_date',
        'venue',
        'location',
        'contact_no',
        'admin_emails',
        'marketing_emails',
        'image',
        'banner_image',
        'page_top_text',
        'footer_text_1',
        'footer_text_2',
        'page_form_detail',
        'meta_title',
        'meta_keywords',
        'meta_description',
        'meta_image'
    ];

    public function eventImages()
    {
        return $this->hasMany(EventImage::class);
    }

    public function eventSchedules()
    {
        return $this->hasMany(EventSchedule::class);
    }

    public function eventExtraField()
    {
        return $this->hasMany(EventExtraField::class);
    }

    public function eventEmailTemplate()
    {
        return $this->hasMany(EventEmailTemplate::class);
    }

    public function eventTickets()
    {
        return $this->hasMany(EventTicket::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
