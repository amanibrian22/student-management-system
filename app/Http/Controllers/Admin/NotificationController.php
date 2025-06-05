<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\Student;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Notification::with('student')->get();
        return view('admin.notifications.index', compact('notifications'));
    }

    public function create()
    {
        $students = Student::all();
        return view('admin.notifications.create', compact('students'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'sent_at' => 'required|date',
            'read' => 'boolean',
        ]);

        Notification::create($request->all());
        return redirect()->route('admin.notifications.index')->with('success', 'Notification added.');
    }

    public function edit(Notification $notification)
    {
        $students = Student::all();
        return view('admin.notifications.edit', compact('notification', 'students'));
    }

    public function update(Request $request, Notification $notification)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'sent_at' => 'required|date',
            'read' => 'boolean',
        ]);

        $notification->update($request->all());
        return redirect()->route('admin.notifications.index')->with('success', 'Notification updated.');
    }

    public function destroy(Notification $notification)
    {
        $notification->delete();
        return redirect()->route('admin.notifications.index')->with('success', 'Notification deleted.');
    }
}