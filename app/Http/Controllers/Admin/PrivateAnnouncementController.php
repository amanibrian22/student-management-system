<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\PrivateAnnouncementNotification;
use App\Models\PrivateAnnouncement;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

        $announcement = PrivateAnnouncement::create([
            'student_id' => $request->student_id,
            'title' => $request->title,
            'content' => $request->content,
            'posted_date' => $request->posted_date,
        ]);

        if ($announcement->student->email) {
            Mail::to($announcement->student->email)->queue(new PrivateAnnouncementNotification($announcement));
        }

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

        $privateAnnouncement->update([
            'student_id' => $request->student_id,
            'title' => $request->title,
            'content' => $request->content,
            'posted_date' => $request->posted_date,
        ]);

        return redirect()->route('private_announcements.index')->with('success', 'Private Announcement updated successfully.');
    }

    public function destroy(PrivateAnnouncement $privateAnnouncement)
    {
        $privateAnnouncement->delete();
        return redirect()->route('private_announcements.index')->with('success', 'Private Announcement deleted successfully.');
    }
}