<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{

    protected $fillable = [
        'page_id',
        'name',
        'feedback',
        'designation',
        'image',
        'order_no',
        'status',
    ];

    public function page()
    {
        return $this->belongsTo(Page::class);
    }
}
