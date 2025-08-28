<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonorEmail extends Model
{
    use HasFactory;
    protected $fillable = [
        'donor_id',
        'template_id',
        'subject',
        'body',
        'attachment_paths',
        'sent_at',
        'status',
        'sent_by',
        'created_by',
        'updated_by',
    ];
}
