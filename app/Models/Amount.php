<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Amount extends Model
{
    protected $table = 'amounts';

    protected $fillable = [
        'title',
        'amount',
        'donation_form_id',
    ];
}
