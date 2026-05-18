<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExamRegistration extends Model
{
    protected $fillable = [
        'full_name', 'birth_date', 'birth_place', 'passport_number', 
        'gender', 'exam_level', 'exam_month', 'phone', 'email', 'message', 'status', 'admin_notes'
    ];
}
