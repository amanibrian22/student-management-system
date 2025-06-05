<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    public function submit(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $student = Auth::user()->student;

        Feedback::create([
            'student_id' => $student->id,
            'content' => $request->content,
            'submitted_at' => now(),
        ]);

        return redirect()->route('dashboard')->with('success', 'Feedback submitted successfully');
    }
}