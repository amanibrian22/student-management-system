<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - AcademiTrack</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="shortcut icon" href="img/logo.jpg" type="image/x-icon">
    <style>
        .profile-card {
            background: linear-gradient(135deg, #ffffff 0%, #f9fafb 100%);
        }
        .profile-field {
            transition: all 0.3s ease;
        }
        .profile-field:hover {
            transform: translateX(5px);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-50 to-gray-100 font-sans">
    <div class="flex h-screen">
        @include('student.sidebar')
        <div class="flex flex-col flex-1 overflow-hidden">
            <main class="flex-1 overflow-y-auto p-4 md:p-8">
                <div class="flex items-center justify-between mb-8">
                    <div>
                        <h1 class="text-2xl md:text-3xl font-bold text-gray-800">My Profile</h1>
                        <p class="text-gray-500 mt-1">Manage your personal information</p>
                    </div>
                    <div class="h-10 w-10 bg-blue-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-user-cog text-blue-600"></i>
                    </div>
                </div>

                <div class="profile-card rounded-xl shadow-md overflow-hidden border border-gray-100">
                    <div class="p-6 md:p-8">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="profile-field flex items-start p-4 rounded-lg bg-gray-50">
                                <div class="mr-4 mt-1">
                                    <i class="fas fa-user text-blue-500"></i>
                                </div>
                                <div>
                                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider">Name</label>
                                    <p class="text-gray-700 font-medium mt-1">{{ $student->name }}</p>
                                </div>
                            </div>

                            <div class="profile-field flex items-start p-4 rounded-lg bg-gray-50">
                                <div class="mr-4 mt-1">
                                    <i class="fas fa-id-card text-blue-500"></i>
                                </div>
                                <div>
                                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider">Student ID</label>
                                    <p class="text-gray-700 font-medium mt-1">{{ $student->student_id }}</p>
                                </div>
                            </div>

                            <div class="profile-field flex items-start p-4 rounded-lg bg-gray-50">
                                <div class="mr-4 mt-1">
                                    <i class="fas fa-envelope text-blue-500"></i>
                                </div>
                                <div>
                                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider">Email</label>
                                    <p class="text-gray-700 font-medium mt-1">{{ $student->email }}</p>
                                </div>
                            </div>

                            <div class="profile-field flex items-start p-4 rounded-lg bg-gray-50">
                                <div class="mr-4 mt-1">
                                    <i class="fas fa-phone text-blue-500"></i>
                                </div>
                                <div>
                                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider">Phone</label>
                                    <p class="text-gray-700 font-medium mt-1">{{ $student->phone ?? 'N/A' }}</p>
                                </div>
                            </div>

                            <div class="profile-field flex items-start p-4 rounded-lg bg-gray-50">
                                <div class="mr-4 mt-1">
                                    <i class="fas fa-users text-blue-500"></i>
                                </div>
                                <div>
                                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider">Class</label>
                                    <p class="text-gray-700 font-medium mt-1">{{ $student->class ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>