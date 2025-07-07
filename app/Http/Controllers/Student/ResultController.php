<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ResultController extends Controller
{
    public function index()
    {
        $student = Auth::user()->student;
        $results = \App\Models\Result::where('student_id', $student->id)->orderBy('exam_date', 'desc')->get();
        return view('student.results', compact('results'));
    }
}