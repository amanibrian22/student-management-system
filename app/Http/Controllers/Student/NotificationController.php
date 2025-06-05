<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {
        $student = Auth::user()->student;
        $notifications = $student->notifications()->orderBy('sent_at', 'desc')->get();
        return view('student.notifications', compact('notifications'));
    }
}