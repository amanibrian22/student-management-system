<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput($request->only('email'));
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }

    public function dashboard()
    {
        $stats = [
            'students' => \App\Models\Student::count(),
            'timetables' => \App\Models\Timetable::count(),
            'attendances' => \App\Models\Attendance::count(),
            'results' => \App\Models\Result::count(),
            'announcements' => \App\Models\Announcement::count(),
            'private_announcements' => \App\Models\PrivateAnnouncement::count(),
            'notifications' => \App\Models\Notification::count(),
            'feedbacks' => \App\Models\Feedback::count(),
        ];
        return view('admin.dashboard', compact('stats'));
    }
}