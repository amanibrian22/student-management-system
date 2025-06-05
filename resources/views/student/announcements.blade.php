<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Announcements - AcademiTrack</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="shortcut icon" href="img/logo.jpg" type="image/x-icon">
    <style>
        .announcement-card {
            transition: all 0.3s ease;
            border-left-width: 4px;
        }
        .announcement-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
        }
        .public-announcement { border-left-color: #3b82f6; }
        .private-announcement { border-left-color: #8b5cf6; }
    </style>
</head>
<body class="bg-gray-50 font-sans">
    <div class="flex h-screen">
        @include('student.sidebar')
        <div class="flex flex-col flex-1 overflow-hidden">
            <main class="flex-1 overflow-y-auto p-4 md:p-8">
                <div class="flex items-center justify-between mb-8">
                    <div>
                        <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Announcements</h1>
                        <p class="text-gray-500 mt-1">Important updates and notices</p>
                    </div>
                    <div class="h-10 w-10 bg-blue-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-bullhorn text-blue-600"></i>
                    </div>
                </div>

                <div class="space-y-6">
                    <div class="bg-white rounded-xl shadow-md overflow-hidden announcement-card public-announcement">
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-4">
                                <h2 class="text-lg font-semibold text-gray-700">Public Announcements</h2>
                                <span class="h-8 w-8 bg-blue-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-users text-blue-600 text-sm"></i>
                                </span>
                            </div>
                            
                            @if($announcements->isEmpty())
                                <div class="text-center py-4">
                                    <i class="fas fa-bell-slash text-2xl text-gray-300 mb-2"></i>
                                    <p class="text-gray-500">No public announcements</p>
                                </div>
                            @else
                                <div class="space-y-4">
                                    @foreach($announcements as $announcement)
                                    <div class="p-4 rounded-lg bg-gray-50 hover:bg-gray-100 transition-colors">
                                        <div class="flex items-start">
                                            <div class="mr-4 mt-1">
                                                <i class="fas fa-info-circle text-blue-500"></i>
                                            </div>
                                            <div class="flex-1">
                                                <h3 class="font-medium text-gray-800">{{ $announcement->title }}</h3>
                                                <p class="text-gray-600 mt-1">{{ $announcement->content }}</p>
                                                <div class="mt-2 text-xs text-gray-500">
                                                    <i class="far fa-clock mr-1"></i> Posted: 
                                                    @if($announcement->posted_date instanceof \Illuminate\Support\Carbon)
                                                        {{ $announcement->posted_date->format('M d, Y \a\t h:i A') }}
                                                    @else
                                                        {{ $announcement->posted_date }}
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-md overflow-hidden announcement-card private-announcement">
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-4">
                                <h2 class="text-lg font-semibold text-gray-700">Private Announcements</h2>
                                <span class="h-8 w-8 bg-purple-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-lock text-purple-600 text-sm"></i>
                                </span>
                            </div>
                            
                            @if($privateAnnouncements->isEmpty())
                                <div class="text-center py-4">
                                    <i class="fas fa-envelope-open text-2xl text-gray-300 mb-2"></i>
                                    <p class="text-gray-500">No private announcements</p>
                                </div>
                            @else
                                <div class="space-y-4">
                                    @foreach($privateAnnouncements as $pa)
                                    <div class="p-4 rounded-lg bg-gray-50 hover:bg-gray-100 transition-colors">
                                        <div class="flex items-start">
                                            <div class="mr-4 mt-1">
                                                <i class="fas fa-user-shield text-purple-500"></i>
                                            </div>
                                            <div class="flex-1">
                                                <h3 class="font-medium text-gray-800">{{ $pa->title }}</h3>
                                                <p class="text-gray-600 mt-1">{{ $pa->content }}</p>
                                                <div class="mt-2 text-xs text-gray-500">
                                                    <i class="far fa-clock mr-1"></i> Posted: 
                                                    @if($pa->posted_date instanceof \Illuminate\Support\Carbon)
                                                        {{ $pa->posted_date->format('M d, Y \a\t h:i A') }}
                                                    @else
                                                        {{ $pa->posted_date }}
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>