<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Student;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalStudents = Student::count();
        return view('admin.dashboard', compact('totalStudents'));
    }
}