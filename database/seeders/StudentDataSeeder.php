<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Student;
use App\Models\Announcement;
use App\Models\PrivateAnnouncement;
use App\Models\Attendance;
use App\Models\Timetable;
use App\Models\Result;
use App\Models\Feedback;
use App\Models\Notification;
use Carbon\Carbon;

class StudentDataSeeder extends Seeder
{
    public function run()
    {
        // Create a user
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'password' => bcrypt('password123'),
        ]);

        // Create a student
        $student = Student::create([
            'user_id' => $user->id,
            'student_id' => 'STU12345',
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'phone' => '123-456-7890',
        ]);

        // Create announcements
        Announcement::create([
            'title' => 'Exam Schedule Released',
            'content' => 'Mid-term exams start on July 1, 2025. Prepare accordingly.',
            'posted_date' => Carbon::parse('2025-06-02'),
        ]);

        Announcement::create([
            'title' => 'Welcome Back!',
            'content' => 'Classes resume on June 10, 2025. Please check your schedules.',
            'posted_date' => Carbon::parse('2025-06-03'),
        ]);

        // Create private announcement
        PrivateAnnouncement::create([
            'student_id' => $student->id,
            'title' => 'Assignment Submission',
            'content' => 'Submit your Math assignment by June 5, 2025.',
            'posted_date' => Carbon::parse('2025-06-03'),
        ]);

        // Create attendance
        Attendance::create([
            'student_id' => $student->id,
            'date' => Carbon::parse('2025-06-02'),
            'present' => true,
            'course_code' => 'MATH101',
        ]);

        // Create timetable
        Timetable::create([
            'student_id' => $student->id,
            'course_code' => 'MATH101',
            'course_name' => 'Mathematics',
            'day_of_week' => 'Monday',
            'start_time' => '09:00:00',
            'end_time' => '10:30:00',
            'location' => 'Room 101',
        ]);

        // Create result
        Result::create([
            'student_id' => $student->id,
            'course_code' => 'MATH101',
            'course_name' => 'Mathematics',
            'grade' => 'A',
            'percentage' => 90,
            'exam_date' => Carbon::parse('2025-06-01'),
        ]);

        // Create feedback
        Feedback::create([
            'student_id' => $student->id,
            'content' => 'Great system, but needs more features!',
            'submitted_at' => now(),
        ]);

        // Create notification
        Notification::create([
            'student_id' => $student->id,
            'title' => 'New Update',
            'content' => 'Check your timetable for updates.',
            'sent_at' => now(),
        ]);
    }
}