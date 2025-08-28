<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class EventEmailTemplate extends Model
{
     public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
