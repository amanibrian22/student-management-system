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
        $timetables = Timetable::orderBy('class')->orderBy('day_of_week')->get();
        return view('admin.pages.timetables.index', compact('timetables'));
    }

    public function create()
    {
        $classes = Student::distinct()->pluck('class')->sort();
        return view('admin.pages.timetables.create', compact('classes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'timetables' => 'required|array|min:1',
            'timetables.*.class' => ['required', 'string', 'max:50', 'in:' . implode(',', Student::distinct()->pluck('class')->toArray())],
            'timetables.*.course_code' => 'required|string|max:10',
            'timetables.*.course_name' => 'required|string|max:100',
            'timetables.*.day_of_week' => 'required|string|in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday',
            'timetables.*.start_time' => 'required|date_format:H:i',
            'timetables.*.end_time' => 'required|date_format:H:i|after:timetables.*.start_time',
            'timetables.*.location' => 'required|string|max:50',
        ]);

        foreach ($request->timetables as $timetableData) {
            Timetable::create($timetableData);
        }

        return redirect()->route('timetables.index')->with('success', 'Timetable entries created successfully.');
    }

    public function edit(Timetable $timetable)
    {
        $classes = Student::distinct()->pluck('class')->sort();
        return view('admin.pages.timetables.edit', compact('timetable', 'classes'));
    }

    public function update(Request $request, Timetable $timetable)
    {
        $request->validate([
            'class' => ['required', 'string', 'max:50', 'in:' . implode(',', Student::distinct()->pluck('class')->toArray())],
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