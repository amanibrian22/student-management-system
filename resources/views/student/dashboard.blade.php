<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Student</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="shortcut icon" href="img/logo.jpg" type="image/x-icon">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Inter', sans-serif;
        }
        
        .card-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e8ed 100%);
        }
        
        .progress-ring {
            transition: stroke-dashoffset 0.35s;
            transform: rotate(-90deg);
            transform-origin: 50% 50%;
        }
    </style>
</head>
<body class="gradient-bg">
    <div class="flex h-screen">
        @include('student.sidebar')
        <div class="flex flex-col flex-1 overflow-hidden">
            <main class="flex-1 overflow-y-auto p-4 md:p-8">
                <!-- Welcome Header -->
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
                    <div>
                        <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Welcome back, <span class="text-blue-600">{{ $student->first_name ?? explode(' ', $student->name)[0] }}</span>!</h1>
                        <p class="text-gray-500 mt-1">Here's what's happening today</p>
                    </div>
                    <div class="mt-4 md:mt-0 flex items-center space-x-2">
                        <span class="text-sm text-gray-500">{{ now()->format('l, F j, Y') }}</span>
                        <span class="h-8 w-8 bg-blue-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-calendar-day text-blue-600 text-sm"></i>
                        </span>
                    </div>
                </div>

                <!-- Dashboard Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Today's Classes -->
                    <div class="bg-white rounded-xl shadow-sm p-6 transition-all duration-300 card-hover border-l-4 border-blue-500">
                        <div class="flex items-center justify-between mb-4">
                            <h2 class="text-lg font-semibold text-gray-700">Today's Classes</h2>
                            <span class="h-8 w-8 bg-blue-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-calendar-alt text-blue-600 text-sm"></i>
                            </span>
                        </div>
                        @if($todaysClasses->isEmpty())
                            <div class="flex items-center justify-center py-4">
                                <p class="text-gray-400 text-sm flex items-center">
                                    <i class="fas fa-coffee mr-2"></i> No classes today
                                </p>
                            </div>
                        @else
                            <ul class="space-y-3">
                                @foreach($todaysClasses as $class)
                                    <li class="flex items-start">
                                        <div class="flex-shrink-0 h-10 w-10 bg-blue-50 rounded-lg flex items-center justify-center mr-3">
                                            <i class="fas fa-book-open text-blue-500"></i>
                                        </div>
                                        <div>
                                            <p class="font-medium text-gray-800">{{ $class->course_name }}</p>
                                            <p class="text-xs text-gray-500">
                                                {{ $class->start_time }} - {{ $class->end_time }} • {{ $class->location }}
                                            </p>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>

                    <!-- Attendance Rate -->
                    <div class="bg-white rounded-xl shadow-sm p-6 transition-all duration-300 card-hover border-l-4 border-green-500">
                        <div class="flex items-center justify-between mb-4">
                            <h2 class="text-lg font-semibold text-gray-700">Attendance Rate</h2>
                            <span class="h-8 w-8 bg-green-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-user-check text-green-600 text-sm"></i>
                            </span>
                        </div>
                        <div class="flex items-center justify-center">
                            <div class="relative w-32 h-32">
                                <svg class="w-full h-full" viewBox="0 0 36 36">
                                    <path
                                        d="M18 2.0845
                                        a 15.9155 15.9155 0 0 1 0 31.831
                                        a 15.9155 15.9155 0 0 1 0 -31.831"
                                        fill="none"
                                        stroke="#e6e6e6"
                                        stroke-width="3"
                                    />
                                    <path
                                        d="M18 2.0845
                                        a 15.9155 15.9155 0 0 1 0 31.831
                                        a 15.9155 15.9155 0 0 1 0 -31.831"
                                        fill="none"
                                        stroke="#10b981"
                                        stroke-width="3"
                                        stroke-dasharray="{{ $attendanceRate }}, 100"
                                        class="progress-ring"
                                    />
                                </svg>
                                <div class="absolute inset-0 flex items-center justify-center flex-col">
                                    <span class="text-3xl font-bold text-gray-800">{{ number_format($attendanceRate, 1) }}%</span>
                                    <span class="text-xs text-gray-500 mt-1">Current</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Average Grade -->
                    <div class="bg-white rounded-xl shadow-sm p-6 transition-all duration-300 card-hover border-l-4 border-purple-500">
                        <div class="flex items-center justify-between mb-4">
                            <h2 class="text-lg font-semibold text-gray-700">Average Grade</h2>
                            <span class="h-8 w-8 bg-purple-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-star text-purple-600 text-sm"></i>
                            </span>
                        </div>
                        <div class="flex flex-col items-center justify-center py-4">
                            <div class="relative">
                                <span class="text-5xl font-bold text-purple-600">{{ number_format($averageGrade, 1) }}%</span>
                                <div class="absolute -right-6 -top-2">
                                    @if($averageGrade >= 80)
                                        <span class="text-xs bg-green-100 text-green-800 px-2 py-1 rounded-full">Excellent</span>
                                    @elseif($averageGrade >= 60)
                                        <span class="text-xs bg-blue-100 text-blue-800 px-2 py-1 rounded-full">Good</span>
                                    @else
                                        <span class="text-xs bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full">Needs Work</span>
                                    @endif
                                </div>
                            </div>
                            <p class="text-sm text-gray-500 mt-2">Your current performance</p>
                        </div>
                    </div>

                    <!-- Recent Results -->
                    <div class="bg-white rounded-xl shadow-sm p-6 transition-all duration-300 card-hover border-l-4 border-yellow-500">
                        <div class="flex items-center justify-between mb-4">
                            <h2 class="text-lg font-semibold text-gray-700">Recent Results</h2>
                            <span class="h-8 w-8 bg-yellow-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-clipboard-list text-yellow-600 text-sm"></i>
                            </span>
                        </div>
                        @if($recentResults->isEmpty())
                            <div class="flex items-center justify-center py-4">
                                <p class="text-gray-400 text-sm flex items-center">
                                    <i class="fas fa-inbox mr-2"></i> No recent results
                                </p>
                            </div>
                        @else
                            <ul class="space-y-3">
                                @foreach($recentResults as $result)
                                    <li class="flex items-start">
                                        <div class="flex-shrink-0 h-10 w-10 rounded-lg flex items-center justify-center mr-3 
                                            @if($result->percentage >= 80) bg-green-50 text-green-600
                                            @elseif($result->percentage >= 60) bg-blue-50 text-blue-600
                                            @else bg-yellow-50 text-yellow-600 @endif">
                                            <i class="fas fa-poll"></i>
                                        </div>
                                        <div class="flex-1">
                                            <p class="font-medium text-gray-800">{{ $result->course_name }}</p>
                                            <div class="flex justify-between items-center mt-1">
                                                <span class="text-sm @if($result->percentage >= 80) text-green-600
                                                    @elseif($result->percentage >= 60) text-blue-600
                                                    @else text-yellow-600 @endif">
                                                    {{ $result->grade }} ({{ $result->percentage }}%)
                                                </span>
                                                <span class="text-xs text-gray-500">
                                                    @if($result->exam_date instanceof \Illuminate\Support\Carbon)
                                                        {{ $result->exam_date->format('M d') }}
                                                    @else
                                                        {{ $result->exam_date }}
                                                    @endif
                                                </span>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>

                    <!-- Announcements -->
                    <div class="bg-white rounded-xl shadow-sm p-6 transition-all duration-300 card-hover border-l-4 border-red-500">
                        <div class="flex items-center justify-between mb-4">
                            <h2 class="text-lg font-semibold text-gray-700">Announcements</h2>
                            <span class="h-8 w-8 bg-red-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-bullhorn text-red-600 text-sm"></i>
                            </span>
                        </div>
                        @if($announcements->isEmpty())
                            <div class="flex items-center justify-center py-4">
                                <p class="text-gray-400 text-sm flex items-center">
                                    <i class="fas fa-bell-slash mr-2"></i> No announcements
                                </p>
                            </div>
                        @else
                            <ul class="space-y-3">
                                @foreach($announcements as $announcement)
                                    <li class="group">
                                        <div class="flex items-start">
                                            <div class="flex-shrink-0 h-10 w-10 bg-red-50 rounded-lg flex items-center justify-center mr-3">
                                                <i class="fas fa-info-circle text-red-500"></i>
                                            </div>
                                            <div>
                                                <p class="font-medium text-gray-800 group-hover:text-red-600 transition-colors">
                                                    {{ $announcement->title }}
                                                </p>
                                                <p class="text-sm text-gray-500 mt-1">
                                                    {{ Str::limit($announcement->content, 60) }}
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>

                    <!-- Private Announcements -->
                    <div class="bg-white rounded-xl shadow-sm p-6 transition-all duration-300 card-hover border-l-4 border-indigo-500">
                        <div class="flex items-center justify-between mb-4">
                            <h2 class="text-lg font-semibold text-gray-700">Private Announcements</h2>
                            <span class="h-8 w-8 bg-indigo-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-envelope text-indigo-600 text-sm"></i>
                            </span>
                        </div>
                        @if($privateAnnouncements->isEmpty())
                            <div class="flex items-center justify-center py-4">
                                <p class="text-gray-400 text-sm flex items-center">
                                    <i class="fas fa-envelope-open mr-2"></i> No messages
                                </p>
                            </div>
                        @else
                            <ul class="space-y-3">
                                @foreach($privateAnnouncements as $pa)
                                    <li class="group">
                                        <div class="flex items-start">
                                            <div class="flex-shrink-0 h-10 w-10 bg-indigo-50 rounded-lg flex items-center justify-center mr-3">
                                                <i class="fas fa-lock text-indigo-500"></i>
                                            </div>
                                            <div>
                                                <p class="font-medium text-gray-800 group-hover:text-indigo-600 transition-colors">
                                                    {{ $pa->title }}
                                                </p>
                                                <p class="text-sm text-gray-500 mt-1">
                                                    {{ Str::limit($pa->content, 60) }}
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>