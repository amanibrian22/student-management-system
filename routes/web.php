<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\Auth\LoginController;
use App\Http\Controllers\Student\DashboardController;
use App\Http\Controllers\Student\ProfileController;
use App\Http\Controllers\Student\TimetableController;
use App\Http\Controllers\Student\ResultController;
use App\Http\Controllers\Student\AttendanceController;
use App\Http\Controllers\Student\AnnouncementController;
use App\Http\Controllers\Student\NotificationController;
use App\Http\Controllers\Student\FeedbackController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\StudentController as AdminStudentController;
use App\Http\Controllers\Admin\TimetableController as AdminTimetableController;
use App\Http\Controllers\Admin\AttendanceController as AdminAttendanceController;
use App\Http\Controllers\Admin\ResultController as AdminResultController;
use App\Http\Controllers\Admin\AnnouncementController as AdminAnnouncementController;
use App\Http\Controllers\Admin\PrivateAnnouncementController;
use App\Http\Controllers\Admin\NotificationController as AdminNotificationController;
use App\Http\Controllers\Admin\FeedbackController as AdminFeedbackController;

// Public Routes
Route::get('/', [WelcomeController::class, 'index'])->name('homepage');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Student Routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/timetable', [TimetableController::class, 'index'])->name('timetable');
    Route::get('/results', [ResultController::class, 'index'])->name('results');
    Route::get('/attendance', [AttendanceController::class, 'index'])->name('attendance');
    Route::get('/announcements', [AnnouncementController::class, 'index'])->name('announcements');
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications');
    Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback');
    Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');
});

// Admin Routes
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'login'])->name('admin.login.post');
    Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');

    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::resources([
            'students' => AdminStudentController::class,
            'timetables' => AdminTimetableController::class,
            'attendances' => AdminAttendanceController::class,
            'results' => AdminResultController::class,
            'announcements' => AdminAnnouncementController::class,
            'private_announcements' => PrivateAnnouncementController::class,
            'notifications' => AdminNotificationController::class,
            'feedback' => AdminFeedbackController::class,
        ]);
    });
});