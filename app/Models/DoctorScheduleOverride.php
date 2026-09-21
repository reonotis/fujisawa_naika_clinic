<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoctorScheduleOverride extends Model
{
    protected $fillable = [
        'date',
        'is_closed',
        'am_doctor_id',
        'pm_doctor_id',
        'note',
    ];

    protected $casts = [
        'date' => 'date:Y-m-d',
        'is_closed' => 'boolean',
    ];
}
