<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{

    protected $casts = [
        'question' => 'array',
        'answer' => 'array'
    ];
    protected $fillable = ['page_id', 'question', 'answer'];

    public function page()
    {
        return $this->belongsTo(Page::class);
    }
}
