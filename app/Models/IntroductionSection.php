<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IntroductionSection extends Model
{

    protected $fillable = [
        'page_id',
        'type',
        'title',
        'subtitle',
        'description',
        'images',
        'status',
    ];


    public function page()
    {
        return $this->belongsTo(Page::class);
    }
}
