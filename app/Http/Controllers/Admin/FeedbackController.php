<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use App\Models\Student;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedback = Feedback::with('student')->get();
        return view('admin.feedback.index', compact('feedback'));
    }

    public function create()
    {
        $students = Student::all();
        return view('admin.feedback.create', compact('students'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'content' => 'required|string',
            'submitted_at' => 'required|date',
            'read' => 'boolean',
        ]);

        Feedback::create($request->all());
        return redirect()->route('admin.feedback.index')->with('success', 'Feedback added.');
    }

    public function edit(Feedback $feedback)
    {
        $students = Student::all();
        return view('admin.feedback.edit', compact('feedback', 'students'));
    }

    public function update(Request $request, Feedback $feedback)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'content' => 'required|string',
            'submitted_at' => 'required|date',
            'read' => 'boolean',
        ]);

        $feedback->update($request->all());
        return redirect()->route('admin.feedback.index')->with('success', 'Feedback updated.');
    }

    public function destroy(Feedback $feedback)
    {
        $feedback->delete();
        return redirect()->route('admin.feedback.index')->with('success', 'Feedback deleted.');
    }
}