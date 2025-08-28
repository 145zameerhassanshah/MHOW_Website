<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmailAttachment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'template_id',
        'file_path',
        'file_name',
        'file_type',
    ];

    public function template()
    {
        return $this->belongsTo(EmailTemplate::class, 'template_id');
    }
}
