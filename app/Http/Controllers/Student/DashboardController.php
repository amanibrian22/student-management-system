<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        Log::info('Dashboard accessed', [
            'user_id' => $user ? $user->id : null,
            'user_email' => $user ? $user->email : null,
        ]);

        $student = $user->student;
        if (!$student) {
            Log::error('No student profile found for user', [
                'user_id' => $user->id,
                'user_email' => $user->email,
            ]);
            return redirect()->route('login')->withErrors(['error' => 'No student profile found. Please contact an admin.']);
        }

        try {
            $todaysClasses = $student->timetable()
                ->where('day_of_week', now()->format('l'))
                ->get();
        } catch (\Exception $e) {
            Log::error('Failed to load timetable', [
                'student_id' => $student->id,
                'error' => $e->getMessage(),
            ]);
            $todaysClasses = collect([]);
        }

        try {
            $totalAttendance = $student->attendace()->count();
            $attendanceRate = $totalAttendance > 0
                ? ($student->attendace()->where('present', true)->count() / $totalAttendance * 100)
                : 0;
        } catch (\Exception $e) {
            Log::error('Failed to load attendance', [
                'student_id' => $student->id,
                'error' => $e->getMessage(),
            ]);
            $attendanceRate = 0;
        }

        try {
            $averageGrade = $student->results()->avg('percentage') ?? 0;
            $recentResults = $student->results()
                ->orderBy('exam_date', 'desc')
                ->take(5)
                ->get();
        } catch (\Exception $e) {
            Log::error('Failed to load results', [
                'student_id' => $student->id,
                'error' => $e->getMessage(),
            ]);
            $averageGrade = 0;
            $recentResults = collect([]);
        }

        try {
            $announcements = \App\Models\Announcement::orderBy('posted_date', 'desc')
                ->take(5)
                ->get();
        } catch (\Exception $e) {
            Log::error('Failed to load announcements', [
                'student_id' => $student->id,
                'error' => $e->getMessage(),
            ]);
            $announcements = collect([]);
        }

        try {
            $privateAnnouncements = $student->privateAnnoucement()
                ->orderBy('posted_date', 'desc')
                ->take(5)
                ->get();
        } catch (\Exception $e) {
            Log::error('Failed to load private announcements', [
                'student_id' => $student->id,
                'error' => $e->getMessage(),
            ]);
            $privateAnnouncements = collect([]);
        }

        try {
            $notifications = $student->notifications()
                ->orderBy('sent_at', 'desc')
                ->take(5)
                ->get();
        } catch (\Exception $e) {
            Log::error('Failed to load notifications', [
                'student_id' => $student->id,
                'error' => $e->getMessage(),
            ]);
            $notifications = collect([]);
        }

        try {
            $feedback = $student->feedback()
                ->orderBy('submitted_at', 'desc')
                ->take(5)
                ->get();
        } catch (\Exception $e) {
            Log::error('Failed to load feedback', [
                'student_id' => $student->id,
                'error' => $e->getMessage(),
            ]);
            $feedback = collect([]);
        }

        return view('student.dashboard', compact(
            'student',
            'todaysClasses',
            'attendanceRate',
            'averageGrade',
            'recentResults',
            'announcements',
            'privateAnnouncements',
            'notifications',
            'feedback'
        ));
    }
}