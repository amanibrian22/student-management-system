<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $fillable = ['student_id', 'course_name', 'assignment_title', 'grade', 'date'];
    protected $dates = ['date'];
}