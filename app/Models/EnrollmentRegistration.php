<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EnrollmentRegistration extends Model
{
    protected $fillable = [
        'full_name', 'birth_date', 'birth_place', 'passport_number', 
        'gender', 'course_name', 'phone', 'email', 'message', 'status', 'admin_notes'
    ];
}
