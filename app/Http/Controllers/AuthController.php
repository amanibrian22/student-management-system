<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Student;
use App\Models\Attendance;
use App\Models\Timetable;
use App\Models\PrivateAnnouncement;
use App\Models\Result;
use App\Models\Feedback;
use App\Models\Notification;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('dashboard')->with('success', 'Login successful');
        }

        return redirect()->back()->withErrors(['email' => 'Invalid credentials'])->withInput();
    }

    public function showDashboard()
    {
        $student = Student::where('user_id', Auth::id())->firstOrFail();
        $attendace = Attendance::where('student_id', $student->id)->get();
        $timetable = Timetable::where('student_id', $student->id)->get();
        $privateAnnoucement = PrivateAnnouncement::where('student_id', $student->id)->get();
        $results = Result::where('student_id', $student->id)->get();
        $feedback = Feedback::where('student_id', $student->id)->get();
        $notifications = Notification::where('student_id', $student->id)->get();

        return view('dashboard', compact('student', 'attendace', 'timetable', 'privateAnnoucement', 'results', 'feedback', 'notifications'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home')->with('success', 'Logged out successfully');
    }
}