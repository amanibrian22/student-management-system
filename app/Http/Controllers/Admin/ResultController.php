<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Result;
use App\Models\Student;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function index()
    {
        $results = Result::with('student')->orderBy('student_id')->orderBy('exam_date')->get();
        return view('admin.pages.results.index', compact('results'));
    }

    public function create()
    {
        $students = Student::all();
        return view('admin.pages.results.create', compact('students'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'results' => 'required|array|min:1',
            'results.*.student_id' => 'required|exists:students,id',
            'results.*.course_code' => 'required|string|max:10',
            'results.*.course_name' => 'required|string|max:100',
            'results.*.grade' => 'required|string|max:5',
            'results.*.percentage' => 'required|numeric|between:0,100',
            'results.*.exam_date' => 'required|date',
        ]);

        foreach ($request->results as $resultData) {
            Result::create($resultData);
        }

        return redirect()->route('results.index')->with('success', 'Results created successfully.');
    }

    public function edit(Result $result)
    {
        $students = Student::all();
        return view('admin.pages.results.edit', compact('result', 'students'));
    }

    public function update(Request $request, Result $result)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_code' => 'required|string|max:10',
            'course_name' => 'required|string|max:100',
            'grade' => 'required|string|max:5',
            'percentage' => 'required|numeric|between:0,100',
            'exam_date' => 'required|date',
        ]);

        $result->update($request->all());

        return redirect()->route('results.index')->with('success', 'Result updated successfully.');
    }

    public function destroy(Result $result)
    {
        $result->delete();
        return redirect()->route('results.index')->with('success', 'Result deleted successfully.');
    }
}