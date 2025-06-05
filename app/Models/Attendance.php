<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = 'attendace';
    protected $fillable = ['student_id', 'date', 'present', 'course_code'];
    protected $casts = [
        'date' => 'date',
        'present' => 'boolean',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}