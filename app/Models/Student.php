<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['user_id', 'student_id', 'name', 'first_name', 'email', 'phone', 'class'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function attendace()
    {
        return $this->hasMany(Attendance::class, 'student_id');
    }

    public function timetable()
    {
        return $this->hasMany(Timetable::class, 'student_id');
    }

    public function privateAnnoucement()
    {
        return $this->hasMany(PrivateAnnouncement::class, 'student_id');
    }

    public function results()
    {
        return $this->hasMany(Result::class, 'student_id');
    }

    public function feedback()
    {
        return $this->hasMany(Feedback::class, 'student_id');
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class, 'student_id');
    }
}