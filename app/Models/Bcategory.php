<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Bcategory extends Model
{
    protected $fillable = [
        'name',
        'description',
        'slug',
        'status',
        'serial_number',
    ];


    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }
}
