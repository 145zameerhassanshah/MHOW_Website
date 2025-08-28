<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{


    protected $fillable = [
        'bcategory_id',
        'title',
        'content',
        'slug',
        'image',
        'status',
        'meta_keywords',
        'meta_description',
        'serial_number',
    ];

    public function bcategory()
    {
        return $this->belongsTo(Bcategory::class, 'bcategory_id');
    }
}
