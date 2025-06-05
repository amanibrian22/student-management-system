<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('user')->get();
        return view('admin.pages.students.index', compact('students'));
    }

    public function create()
    {
        return view('admin.pages.students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:255|unique:users,email',
            'student_id' => 'required|string|max:20|unique:students,student_id',
            'phone' => 'nullable|string|max:20',
            'class' => 'nullable|string|max:10',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        Student::create([
            'user_id' => $user->id,
            'student_id' => $request->student_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'class' => $request->class,
        ]);

        return redirect()->route('students.index')->with('success', 'Student created successfully.');
    }

    public function edit(Student $student)
    {
        return view('admin.pages.students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:255|unique:users,email,' . $student->user_id,
            'student_id' => 'required|string|max:20|unique:students,student_id,' . $student->id,
            'phone' => 'nullable|string|max:20',
            'class' => 'nullable|string|max:10',
            'password' => 'nullable|string|min:8',
        ]);

        $student->user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $student->user->password,
        ]);

        $student->update([
            'student_id' => $request->student_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'class' => $request->class,
        ]);

        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    public function destroy(Student $student)
    {
        $student->user->delete();
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}