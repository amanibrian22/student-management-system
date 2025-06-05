<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = 'notifications';
    protected $fillable = ['student_id', 'title', 'content', 'sent_at', 'read'];

    protected $casts = [
        'sent_at' => 'datetime',
        'read' => 'boolean',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}