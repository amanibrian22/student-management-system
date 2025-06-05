<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PrivateAnnouncement;
use App\Models\Student;
use Illuminate\Http\Request;

class PrivateAnnouncementController extends Controller
{
    public function index()
    {
        $privateAnnouncements = PrivateAnnouncement::with('student')->orderBy('posted_date', 'desc')->get();
        return view('admin.pages.private_announcements.index', compact('privateAnnouncements'));
    }

    public function create()
    {
        $students = Student::all();
        return view('admin.pages.private_announcements.create', compact('students'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'posted_date' => 'required|date',
        ]);

        PrivateAnnouncement::create($request->all());

        return redirect()->route('private_announcements.index')->with('success', 'Private Announcement created successfully.');
    }

    public function edit(PrivateAnnouncement $privateAnnouncement)
    {
        $students = Student::all();
        return view('admin.pages.private_announcements.edit', compact('privateAnnouncement', 'students'));
    }

    public function update(Request $request, PrivateAnnouncement $privateAnnouncement)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'posted_date' => 'required|date',
        ]);

        $privateAnnouncement->update($request->all());

        return redirect()->route('private_announcements.index')->with('success', 'Private Announcement updated successfully.');
    }

    public function destroy(PrivateAnnouncement $privateAnnouncement)
    {
        $privateAnnouncement->delete();
        return redirect()->route('private_announcements.index')->with('success', 'Private Announcement deleted successfully.');
    }
}