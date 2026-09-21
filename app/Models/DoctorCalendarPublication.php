<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoctorCalendarPublication extends Model
{
    protected $fillable = [
        'target_month',
        'is_published',
        'published_at',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];
}
