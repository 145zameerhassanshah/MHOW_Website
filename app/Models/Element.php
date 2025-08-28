<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Element extends Model
{
    protected $fillable = [
        'element_name',
        'title',
        'subtitle',
        'description',
        'icon',
        'image',
    ];

    public function features()
    {
        return $this->hasMany(ElementFeature::class);
    }
    public function page()
    {
        return $this->belongsTo(Page::class);
    }
}
