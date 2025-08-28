<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Donor extends Model
{
    use HasFactory, SoftDeletes;

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function createdBy()
{
    return $this->belongsTo(User::class, 'created_by');
}
public function updatedBy()
{
    return $this->belongsTo(User::class, 'updated_by');
}

public function deletedBy()
{
    return $this->belongsTo(User::class, 'deleted_by');
}



    public function city()
    {
        return $this->belongsTo(City::class);
    }
    protected $fillable = [
        'name',
        'account_name',
        'email',
        'phone',
        'country_id',
        'city_id',
        'is_receive_email',
        'created_at',
        'updated_at',
    ];
}
