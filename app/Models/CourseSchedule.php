<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseSchedule extends Model
{
    protected $fillable = ['session_type', 'level', 'schedule_time', 'duration', 'order', 'is_active'];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
