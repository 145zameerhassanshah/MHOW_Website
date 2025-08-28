<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes; 

use Illuminate\Database\Eloquent\Model;

class VolunteerType extends Model
{
    use SoftDeletes;
    
     protected $fillable = ['title', 'icon', 'order_no', 'status'];

    // Relationship: One VolunteerType has many Volunteers
    public function volunteers()
    {
        return $this->hasMany(Volunteer::class);
    }
}
