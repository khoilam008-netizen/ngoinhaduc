<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExamSchedule extends Model
{
    protected $fillable = ['month', 'registration_date_info', 'exam_date_info', 'is_open', 'display_order'];

    protected $casts = [
        'is_open' => 'boolean',
    ];
}
