<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use App\Models\PrivateAnnouncement;
use Illuminate\Support\Facades\Auth;

class AnnouncementController extends Controller
{
    public function index()
    {
        $student = Auth::user()->student;
        $announcements = Announcement::orderBy('posted_date', 'desc')->get();
        $privateAnnouncements = PrivateAnnouncement::where('student_id', $student->id)->orderBy('posted_date', 'desc')->get();
        return view('student.announcements', compact('announcements', 'privateAnnouncements'));
    }
}