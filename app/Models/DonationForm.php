<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonationForm extends Model
{
    protected $fillable = [
        'title',
        'sub_title',
        'description',
        'purpose',
        'image',
        'compaign_id',
        'order_no',
        'status'
    ];
    public function amounts()
    {
        return $this->hasMany(Amount::class);
    }

    public function compaign()
    {
        return $this->belongsTo(Campaign::class, 'compain_id');
    }
}
