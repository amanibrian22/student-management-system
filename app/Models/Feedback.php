<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table = 'feedback';
    protected $fillable = ['student_id', 'content', 'submitted_at', 'read'];

    protected $casts = [
        'submitted_at' => 'datetime',
        'read' => 'boolean',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}