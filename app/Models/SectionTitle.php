<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class SectionTitle extends Model
{
    protected $fillable = [
        'page_id',
        'type',
        'title',
        'subtitle',
        'description',
        'status',
    ];

    public function page()
    {
        return $this->belongsTo(Page::class);
    }
}
