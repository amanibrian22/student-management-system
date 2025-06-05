<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrivateAnnouncement extends Model
{
    protected $table = 'private_announcement';

    protected $fillable = ['student_id', 'title', 'content', 'posted_date'];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}