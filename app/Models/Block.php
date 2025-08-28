<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    protected $fillable = [
        'block_name',
        'title',
        'subtitle',
        'description',
        'icon',
        'image',
        'type',
    ];

    public function features()
    {
        return $this->hasMany(BlockFeature::class);
    }
    public function page()
    {
        return $this->belongsTo(Page::class);
    }
        public function BlockGalleries()
    {
        return $this->belongsTo(BlockGallery::class);
    }

}
