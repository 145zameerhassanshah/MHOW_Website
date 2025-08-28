<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = ['category_id', 'status', 'title', 'image', 'video_link', 'serial_number'];
    public function gcategory()
    {
        return $this->belongsTo(Gcategory::class, 'category_id');
    }
}
