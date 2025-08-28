<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CallToAction extends Model
{
    protected $fillable = [
        'page_id',
        'title',
        'subtitle',
        'button_text',
        'button_link',
        'status',
    ];

    public function page()
    {
        return $this->belongsTo(Page::class);
    }
}
