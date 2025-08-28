<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 
class Volunteer extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'notes',
        'status',
        'image',
        'volunteer_type_id',
        'country_id',
        'city_id',
        
    ];

    // Relationship: A Volunteer belongs to a VolunteerType
    public function volunteerType()
    {
        return $this->belongsTo(VolunteerType::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

}
