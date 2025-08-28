<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentRequired extends Model
{

    protected $fillable = [
        'page_id',
        'icon',
        'title',
        'description',
        'order_no',
        'status',
    ];

    public function page()
    {
        return $this->belongsTo(Page::class);
    }
}
