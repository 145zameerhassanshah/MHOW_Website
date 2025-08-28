<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class ElementFeature extends Model
{
    use HasFactory;
    protected $fillable = [
        'element_id', 
        'title', 
        'description', 
        'order_no',
    ];
    public function element()
    {
        return $this->belongsTo(Element::class);
    }
}