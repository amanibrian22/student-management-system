<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications - AcademiTrack</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="shortcut icon" href="img/logo.jpg" type="image/x-icon">
    <style>
        .notification-item {
            transition: all 0.3s ease;
        }
        .notification-item:hover {
            background-color: #f8fafc;
        }
        .unread-notification {
            background-color: #f0f9ff;
        }
    </style>
</head>
<body class="bg-gray-50 font-sans">
    <div class="flex h-screen">
        @include('student.sidebar')
        <div class="flex flex-col flex-1 overflow-hidden">
            <main class="flex-1 overflow-y-auto p-4 md:p-8">
                <div class="flex items-center justify-between mb-8">
                    <div>
                        <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Notifications</h1>
                        <p class="text-gray-500 mt-1">Your recent alerts and updates</p>
                    </div>
                    <div class="h-10 w-10 bg-blue-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-bell text-blue-600"></i>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100">
                    @if($notifications->isEmpty())
                        <div class="p-8 text-center">
                            <i class="fas fa-bell-slash text-4xl text-gray-300 mb-4"></i>
                            <p class="text-gray-500">No notifications found</p>
                        </div>
                    @else
                        <ul class="divide-y divide-gray-100">
                            @foreach($notifications as $notification)
                            <li class="notification-item p-6 @if(!$notification->read) unread-notification @endif">
                                <div class="flex items-start">
                                    <div class="mr-4 mt-1">
                                        @if(!$notification->read)
                                            <span class="h-3 w-3 bg-blue-500 rounded-full block"></span>
                                        @else
                                            <i class="fas fa-circle text-gray-300 text-xs"></i>
                                        @endif
                                    </div>
                                    <div class="flex-1">
                                        <h3 class="font-medium text-gray-800">{{ $notification->title }}</h3>
                                        <p class="text-gray-600 mt-1">{{ $notification->message }}</p>
                                        <div class="mt-2 flex items-center text-xs text-gray-500">
                                            <i class="far fa-clock mr-1"></i>
                                            @if($notification->sent_at instanceof \Illuminate\Support\Carbon\Carbon)
                                                {{ $notification->sent_at->diffForHumans() }}
                                            @else
                                                {{ $notification->sent_at }}
                                            @endif
                                            <span class="mx-2">•</span>
                                            @if($notification->read)
                                                <span class="text-gray-400">Read</span>
                                            @else
                                                <span class="text-blue-500">Unread</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </main>
        </div>
    </div>
</body>
</html>