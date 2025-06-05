<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    public function index()
    {
        $student = Auth::user()->student;
        $attendances = $student->attendace()->orderBy('date', 'desc')->get();
        $total = $attendances->count();
        $present = $attendances->where('present', true)->count();
        $attendanceRate = $total > 0 ? ($present / $total * 100) : 0;
        return view('student.attendance', compact('attendances', 'attendanceRate'));
    }
}