<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroSection extends Model
{
    protected $casts = [
        'title' => 'array',
        'subtitle' => 'array',
        'description' => 'array'
    ];

    protected $fillable = [
        'page_id',
        'title',
        'subtitle',
        'description',
        'background_image',
        'status'
    ];


    public function page()
    {
        return $this->belongsTo(Page::class);
    }
}