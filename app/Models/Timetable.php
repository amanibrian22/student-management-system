<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Timetable extends Model
{
    protected $table = 'timetable';
    protected $fillable = ['student_id', 'course_code', 'course_name', 'day_of_week', 'start_time', 'end_time', 'location'];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}