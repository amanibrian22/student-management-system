<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Timetable;
use Illuminate\Http\Request;

class TimetableController extends Controller
{
    public function index()
    {
        $timetables = Timetable::with('student')->get();
        return view('admin.pages.timetables.index', compact('timetables'));
    }

    public function create()
    {
        $students = Student::all();
        return view('admin.pages.timetables.create', compact('students'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_code' => 'required|string|max:10',
            'course_name' => 'required|string|max:100',
            'day_of_week' => 'required|string|in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'location' => 'required|string|max:50',
        ]);

        Timetable::create($request->all());

        return redirect()->route('timetables.index')->with('success', 'Timetable entry created successfully.');
    }

    public function edit(Timetable $timetable)
    {
        $students = Student::all();
        return view('admin.pages.timetables.edit', compact('timetable', 'students'));
    }

    public function update(Request $request, Timetable $timetable)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_code' => 'required|string|max:10',
            'course_name' => 'required|string|max:100',
            'day_of_week' => 'required|string|in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'location' => 'required|string|max:50',
        ]);

        $timetable->update($request->all());

        return redirect()->route('timetables.index')->with('success', 'Timetable entry updated successfully.');
    }

    public function destroy(Timetable $timetable)
    {
        $timetable->delete();
        return redirect()->route('timetables.index')->with('success', 'Timetable entry deleted successfully.');
    }
}