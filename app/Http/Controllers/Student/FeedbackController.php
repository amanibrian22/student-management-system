<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    public function index()
    {
        $student = Auth::user()->student;
        $feedbacks = Feedback::where('student_id', $student->id)->orderBy('submitted_at', 'desc')->get();
        return view('student.feedback', compact('feedbacks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $student = Auth::user()->student;
        Feedback::create([
            'student_id' => $student->id,
            'content' => $request->content,
            'submitted_at' => now(),
            'read' => false,
        ]);

        return redirect()->route('feedback')->with('success', 'Feedback sent to admin.');
    }
}