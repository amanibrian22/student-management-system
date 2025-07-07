<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrivateAnnouncement extends Model
{
    protected $table = 'private_annoucement';
    protected $fillable = ['student_id', 'title', 'content', 'posted_date'];

    protected $casts = [
        'posted_date' => 'date',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}