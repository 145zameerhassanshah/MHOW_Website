<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $fillable = [
        'page_id',
        'icon',
        'title',
        'subtitle',
        'description',
        'order_no',
        'status',
    ];

    protected $casts = [
        'title' => 'array',
        'subtitle' => 'array',
        'description' => 'array',
        'icon' => 'array',
    ];

    public function page()
    {
        return $this->belongsTo(Page::class);
    }
}
