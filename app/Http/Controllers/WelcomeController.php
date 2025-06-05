<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $announcements = Announcement::orderBy('posted_date', 'desc')->take(5)->get();
        return view('welcome', compact('announcements'));
    }
}