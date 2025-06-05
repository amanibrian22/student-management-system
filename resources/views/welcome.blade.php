<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="shortcut icon" href="/img/logo.jpg" type="image/x-icon">
    <style>
        .hero-gradient {
            background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
        }
        .card-hover {
            transition: all 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px -5px rgba(59, 130, 246, 0.3);
        }
        .nav-link {
            position: relative;
        }
        .nav-link:after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 0;
            background-color: #3b82f6;
            transition: width 0.3s;
        }
        .nav-link:hover:after {
            width: 100%;
        }
    </style>
</head>
<body class="font-sans bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center">
                    <img src="/img/logo.jpg" alt="School Logo" class="h-10 w-10 mr-3">
                    <span class="text-xl font-bold text-blue-600">EduConnect</span>
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="/" class="nav-link text-gray-700 px-3 py-2 font-medium">Home</a>
                    <a href="#announcements" class="nav-link text-gray-700 px-3 py-2 font-medium">Announcements</a>
                    <a href="#features" class="nav-link text-gray-700 px-3 py-2 font-medium">Features</a>
                    <div class="flex space-x-4">
                        <a href="{{ route('login') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                            <i class="fas fa-sign-in-alt mr-2"></i>Login
                        </a>
                    </div>
                </div>
                <div class="md:hidden">
                    <button id="mobile-menu-button" class="p-2 rounded-md text-gray-700 hover:text-blue-600">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>
        <!-- Mobile menu -->
        <div id="mobile-menu" class="md:hidden hidden bg-white shadow-lg">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="/" class="block px-3 py-2 text-base font-medium text-gray-700 hover:bg-blue-50 rounded-md">Home</a>
                <a href="#announcements" class="block px-3 py-2 text-base font-medium text-gray-700 hover:bg-blue-50 rounded-md">Announcements</a>
                <a href="#features" class="block px-3 py-2 text-base font-medium text-gray-700 hover:bg-blue-50 rounded-md">Features</a>
                <a href="{{ route('login') }}" class="block px-3 py-2 text-base font-medium text-white bg-blue-600 rounded-md text-center">
                    <i class="fas fa-sign-in-alt mr-2"></i>Login
                </a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero-gradient">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-24">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-10 md:mb-0">
                    <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">
                        Welcome to <span class="text-blue-600">EduConnect</span>
                    </h1>
                    <p class="text-lg text-gray-600 mb-8">
                        Your complete school portal for students and parents to track academic progress, 
                        view announcements, and stay connected with the school community.
                    </p>
                    <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                        <a href="{{ route('login') }}" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition flex items-center justify-center">
                            <i class="fas fa-sign-in-alt mr-2"></i> Student/Parent Login
                        </a>
                        <a href="#features" class="border border-blue-600 text-blue-600 px-6 py-3 rounded-lg hover:bg-blue-50 transition flex items-center justify-center">
                            <i class="fas fa-info-circle mr-2"></i> Learn More
                        </a>
                    </div>
                </div>
                <div class="md:w-1/2 flex justify-center">
                    <img src="/img/home.png" alt="Students learning" class="rounded-lg shadow-xl max-w-md w-full h-auto border-4 border-white">
                </div>
            </div>
        </div>
    </div>

    <!-- Announcements Section -->
    <div id="announcements" class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-2">School Announcements</h2>
                <div class="w-20 h-1 bg-blue-600 mx-auto"></div>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                @if($announcements->isEmpty())
                    <div class="col-span-3 text-center py-8">
                        <i class="fas fa-calendar-check text-5xl text-gray-300 mb-4"></i>
                        <p class="text-gray-500 text-lg">No current announcements</p>
                    </div>
                @else
                    @foreach($announcements as $announcement)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-100 card-hover">
                            <div class="p-6">
                                <div class="flex items-center mb-4">
                                    <div class="bg-blue-100 p-3 rounded-full">
                                        <i class="fas fa-bullhorn text-blue-600"></i>
                                    </div>
                                    <div class="ml-4">
                                        <h3 class="text-xl font-semibold text-gray-800">{{ $announcement->title }}</h3>
                                        <p class="text-sm text-gray-500 mt-1">
                                            <i class="far fa-clock mr-1"></i>
                                            {{ $announcement->posted_date ? $announcement->posted_date->format('F j, Y') : 'No date specified' }}
                                        </p>
                                    </div>
                                </div>
                                <p class="text-gray-600 mb-4">{{ Str::limit($announcement->content, 120) }}</p>
                                <div class="flex justify-between items-center">
                                    <span class="text-sm text-gray-500">
                                        <i class="fas fa-user-tie mr-1"></i> School Admin
                                    </span>
                                    <a href="#" class="text-blue-600 text-sm font-medium">Read More →</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div id="features" class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-2">Key Features</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Designed to empower students and keep parents informed
                </p>
                <div class="w-20 h-1 bg-blue-600 mx-auto mt-4"></div>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Student Features -->
                <div class="bg-white p-8 rounded-lg shadow-sm border border-gray-100 card-hover">
                    <div class="text-blue-600 mb-4">
                        <i class="fas fa-user-graduate text-4xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">For Students</h3>
                    <ul class="space-y-3 text-gray-600">
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                            <span>View grades</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                            <span>Access class schedules</span>
                        </li>
                    </ul>
                </div>

                <!-- Parent Features -->
                <div class="bg-white p-8 rounded-lg shadow-sm border border-gray-100 card-hover">
                    <div class="text-blue-600 mb-4">
                        <i class="fas fa-users text-4xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">For Parents</h3>
                    <ul class="space-y-3 text-gray-600">
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                            <span>Monitor child's progress</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                            <span>View attendance records</span>
                        </li>
                    </ul>
                </div>

                <!-- Shared Features -->
                <div class="bg-white p-8 rounded-lg shadow-sm border border-gray-100 card-hover">
                    <div class="text-blue-600 mb-4">
                        <i class="fas fa-school text-4xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">School Community</h3>
                    <ul class="space-y-3 text-gray-600">
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                            <span>Important announcements</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                            <span>Meeting with Parents</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Call to Action -->
    <div class="bg-blue-700 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold text-white mb-4">
                Ready to get started?
            </h2>
            <p class="text-xl text-blue-100 mb-8 max-w-2xl mx-auto">
                Join our school community and stay connected with your academic journey
            </p>
            <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-6">
                <a href="{{ route('login') }}" class="bg-white text-blue-700 px-8 py-3 rounded-lg hover:bg-gray-100 transition flex items-center justify-center shadow-lg">
                    <i class="fas fa-sign-in-alt mr-3"></i> 
                    <span class="font-semibold">Login to Portal</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-lg font-semibold mb-4">EduConnect</h3>
                    <img src="/img/logo.jpg" alt="School Logo" class="h-12 w-12 mb-4">
                    <p class="text-gray-400 text-sm">
                        Empowering students, parents, and educators through technology.
                    </p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Contact Us</h3>
                    <address class="text-gray-400 not-italic">
                        <p class="mb-2">541 Kigamboni</p>
                        <p class="mb-2">Dar es Salaam,</p>
                        <p class="mb-2"></p>
                        <p>Email: <a href="mailto:info@schoolsystem.com" class="hover:text-white">info@schoolsystem.com</a></p>
                    </address>
                </div>
            </div>
            <div class="mt-12 border-t border-gray-700 pt-8 text-center">
                <p class="text-gray-400">
                    © 2025 School Management Portal. All rights reserved.
                </p>
            </div>
        </div>
    </footer>

    <!-- Mobile menu script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenuButton.addEventListener('click', function() {
                mobileMenu.classList.toggle('hidden');
            });
        });
    </script>
</body>
</html>