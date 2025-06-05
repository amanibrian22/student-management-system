<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TimetableController extends Controller
{
    public function index()
    {
        $student = Auth::user()->student;
        $timetables = $student->timetable()->orderBy('day_of_week')->get();
        return view('student.timetable', compact('timetables'));
    }
}