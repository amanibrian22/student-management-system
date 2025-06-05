<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - AcademiTrack</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8fafc;
        }
        
        .stat-card {
            transition: all 0.3s ease;
            border-left: 4px solid;
        }
        
        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
        }
        
        .students-card { border-left-color: #3b82f6; }
        .timetables-card { border-left-color: #8b5cf6; }
        .attendance-card { border-left-color: #10b981; }
        .results-card { border-left-color: #ef4444; }
        .announcements-card { border-left-color: #f59e0b; }
        .private-announcements-card { border-left-color: #ec4899; }
        .notifications-card { border-left-color: #14b8a6; }
        .feedback-card { border-left-color: #64748b; }
    </style>
</head>
<body>
    <div class="flex h-screen">
        @include('admin.sidebar')
        <div class="flex flex-col flex-1 overflow-hidden">
            <main class="flex-1 overflow-y-auto p-6">
                <!-- Header -->
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
                    <div>
                        <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Admin Dashboard</h1>
                        <p class="text-gray-500 mt-1">System overview and quick statistics</p>
                    </div>
                    <div class="flex items-center mt-4 md:mt-0">
                        <span class="text-sm text-gray-500 mr-2">{{ now()->format('l, F j, Y') }}</span>
                        <div class="h-8 w-8 bg-blue-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-calendar-day text-blue-600 text-sm"></i>
                        </div>
                    </div>
                </div>

                <!-- Stats Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <!-- Students Card -->
                    <div class="stat-card students-card bg-white rounded-lg shadow-sm p-6">
                        <div class="flex justify-between items-start">
                            <div>
                                <h2 class="text-lg font-semibold text-gray-700 mb-1">Students</h2>
                                <p class="text-3xl font-bold text-gray-800">{{ $stats['students'] }}</p>
                            </div>
                            <div class="h-10 w-10 bg-blue-50 rounded-full flex items-center justify-center">
                                <i class="fas fa-users text-blue-600"></i>
                            </div>
                        </div>
                        <a href="{{ route('students.index') }}" class="mt-4 inline-flex items-center text-sm text-blue-600 hover:text-blue-800">
                            Manage <i class="fas fa-arrow-right ml-1 text-xs"></i>
                        </a>
                    </div>

                    <!-- Timetables Card -->
                    <div class="stat-card timetables-card bg-white rounded-lg shadow-sm p-6">
                        <div class="flex justify-between items-start">
                            <div>
                                <h2 class="text-lg font-semibold text-gray-700 mb-1">Timetables</h2>
                                <p class="text-3xl font-bold text-gray-800">{{ $stats['timetables'] }}</p>
                            </div>
                            <div class="h-10 w-10 bg-purple-50 rounded-full flex items-center justify-center">
                                <i class="fas fa-calendar-alt text-purple-600"></i>
                            </div>
                        </div>
                        <a href="{{ route('timetables.index') }}" class="mt-4 inline-flex items-center text-sm text-blue-600 hover:text-blue-800">
                            Manage <i class="fas fa-arrow-right ml-1 text-xs"></i>
                        </a>
                    </div>

                    <!-- Attendance Card -->
                    <div class="stat-card attendance-card bg-white rounded-lg shadow-sm p-6">
                        <div class="flex justify-between items-start">
                            <div>
                                <h2 class="text-lg font-semibold text-gray-700 mb-1">Attendance</h2>
                                <p class="text-3xl font-bold text-gray-800">{{ $stats['attendances'] }}</p>
                            </div>
                            <div class="h-10 w-10 bg-green-50 rounded-full flex items-center justify-center">
                                <i class="fas fa-user-check text-green-600"></i>
                            </div>
                        </div>
                        <a href="{{ route('attendances.index') }}" class="mt-4 inline-flex items-center text-sm text-blue-600 hover:text-blue-800">
                            Manage <i class="fas fa-arrow-right ml-1 text-xs"></i>
                        </a>
                    </div>

                    <!-- Results Card -->
                    <div class="stat-card results-card bg-white rounded-lg shadow-sm p-6">
                        <div class="flex justify-between items-start">
                            <div>
                                <h2 class="text-lg font-semibold text-gray-700 mb-1">Results</h2>
                                <p class="text-3xl font-bold text-gray-800">{{ $stats['results'] }}</p>
                            </div>
                            <div class="h-10 w-10 bg-red-50 rounded-full flex items-center justify-center">
                                <i class="fas fa-poll text-red-600"></i>
                            </div>
                        </div>
                        <a href="{{ route('results.index') }}" class="mt-4 inline-flex items-center text-sm text-blue-600 hover:text-blue-800">
                            Manage <i class="fas fa-arrow-right ml-1 text-xs"></i>
                        </a>
                    </div>
                </div>

                <!-- Second Row -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Announcements Card -->
                    <div class="stat-card announcements-card bg-white rounded-lg shadow-sm p-6">
                        <div class="flex justify-between items-start">
                            <div>
                                <h2 class="text-lg font-semibold text-gray-700 mb-1">Announcements</h2>
                                <p class="text-3xl font-bold text-gray-800">{{ $stats['announcements'] }}</p>
                            </div>
                            <div class="h-10 w-10 bg-yellow-50 rounded-full flex items-center justify-center">
                                <i class="fas fa-bullhorn text-yellow-600"></i>
                            </div>
                        </div>
                        <a href="{{ route('announcements.index') }}" class="mt-4 inline-flex items-center text-sm text-blue-600 hover:text-blue-800">
                            Manage <i class="fas fa-arrow-right ml-1 text-xs"></i>
                        </a>
                    </div>

                    <!-- Private Announcements Card -->
                    <div class="stat-card private-announcements-card bg-white rounded-lg shadow-sm p-6">
                        <div class="flex justify-between items-start">
                            <div>
                                <h2 class="text-lg font-semibold text-gray-700 mb-1">Private Announcements</h2>
                                <p class="text-3xl font-bold text-gray-800">{{ $stats['private_announcements'] }}</p>
                            </div>
                            <div class="h-10 w-10 bg-pink-50 rounded-full flex items-center justify-center">
                                <i class="fas fa-envelope text-pink-600"></i>
                            </div>
                        </div>
                        <a href="{{ route('private_announcements.index') }}" class="mt-4 inline-flex items-center text-sm text-blue-600 hover:text-blue-800">
                            Manage <i class="fas fa-arrow-right ml-1 text-xs"></i>
                        </a>
                    </div>

                    <!-- Notifications Card -->
                    {{-- <div class="stat-card notifications-card bg-white rounded-lg shadow-sm p-6">
                        <div class="flex justify-between items-start">
                            <div>
                                <h2 class="text-lg font-semibold text-gray-700 mb-1">Notifications</h2>
                                <p class="text-3xl font-bold text-gray-800">{{ $stats['notifications'] }}</p>
                            </div>
                            <div class="h-10 w-10 bg-teal-50 rounded-full flex items-center justify-center">
                                <i class="fas fa-bell text-teal-600"></i>
                            </div>
                        </div>
                        <a href="{{ route('notifications.index') }}" class="mt-4 inline-flex items-center text-sm text-blue-600 hover:text-blue-800">
                            Manage <i class="fas fa-arrow-right ml-1 text-xs"></i>
                        </a>
                    </div> --}}

                    <!-- Feedback Card -->
                    {{-- <div class="stat-card feedback-card bg-white rounded-lg shadow-sm p-6">
                        <div class="flex justify-between items-start">
                            <div>
                                <h2 class="text-lg font-semibold text-gray-700 mb-1">Feedback</h2>
                                <p class="text-3xl font-bold text-gray-800">{{ $stats['feedbacks'] }}</p>
                            </div>
                            <div class="h-10 w-10 bg-gray-50 rounded-full flex items-center justify-center">
                                <i class="fas fa-comment-dots text-gray-600"></i>
                            </div>
                        </div>
                        <a href="{{ route('feedback.index') }}" class="mt-4 inline-flex items-center text-sm text-blue-600 hover:text-blue-800">
                            Manage <i class="fas fa-arrow-right ml-1 text-xs"></i>
                        </a>
                    </div> --}}
                </div>
            </main>
        </div>
    </div>
</body>
</html>