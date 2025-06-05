<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $table = 'results';
    protected $fillable = ['student_id', 'course_code', 'course_name', 'grade', 'percentage', 'exam_date'];

    protected $casts = [
        'exam_date' => 'datetime',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}