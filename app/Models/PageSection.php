<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageSection extends Model
{

    protected $fillable = [
        'page_id',
        'title',
        'subtitle',
        'description',
        'image',
        'type',
        'order_no',
    ];

    // Relationship (optional if needed)
    public function page()
    {
        return $this->belongsTo(Page::class);
    }
}
