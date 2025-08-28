<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = 'job_applications';
    public $timestamps = false;
    public function jcategory()
    {
    	return $this->belongsTo(Jcategory::class);
    }
}
