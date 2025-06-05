<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $table = 'announcements';
    protected $fillable = ['title', 'content', 'posted_date'];

    protected $casts = [
        'posted_date' => 'datetime',
    ];
}