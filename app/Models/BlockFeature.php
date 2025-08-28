<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class BlockFeature extends Model
{
    use HasFactory;

    protected $fillable = [
        'block_id', 
        'title', 
        'order_no',
    ];

    /**
     * Get the element that owns the feature.
     */
    public function block()
    {
        return $this->belongsTo(Block::class);
    }
}