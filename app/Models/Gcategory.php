<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gcategory extends Model
{
    public function galleries()
    {
        return $this->hasMany(Gallery::class, 'id');
    }
}
