<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Student;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendances = Attendance::with('student')->get();
        return view('admin.pages.attendances.index', compact('attendances'));
    }

    public function create()
    {
        $students = Student::all();
        return view('admin.pages.attendances.create', compact('students'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'date' => 'required|date',
            'present' => 'required|boolean',
            'subject' => 'required|string|max:10',
        ]);

        Attendance::create([
            'student_id' => $request->student_id,
            'date' => $request->date,
            'present' => $request->present,
            'subject' => $request->subject,
        ]);

        return redirect()->route('attendances.index')->with('success', 'Attendance record created successfully.');
    }

    public function edit(Attendance $attendance)
    {
        $students = Student::all();
        return view('admin.pages.attendances.edit', compact('attendance', 'students'));
    }

    public function update(Request $request, Attendance $attendance)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'date' => 'required|date',
            'present' => 'required|boolean',
            'subject' => 'required|string|max:10',
        ]);

        $attendance->update([
            'student_id' => $request->student_id,
            'date' => $request->date,
            'present' => $request->present,
            'subject' => $request->subject,
        ]);

        return redirect()->route('attendances.index')->with('success', 'Attendance record updated successfully.');
    }

    public function destroy(Attendance $attendance)
    {
        $attendance->delete();
        return redirect()->route('attendances.index')->with('success', 'Attendance record deleted successfully.');
    }
}