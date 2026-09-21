<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoctorWeeklySchedule extends Model
{
    protected $fillable = [
        'day_of_week',
        'is_closed',
        'am_doctor_id',
        'pm_doctor_id',
    ];

    protected $casts = [
        'is_closed' => 'boolean',
    ];
}
