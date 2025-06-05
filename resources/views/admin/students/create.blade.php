<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student - AcademiTrack</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 font-sans">
    <div class="flex h-screen">
        @include('admin.sidebar')
        <div class="flex flex-col flex-1 overflow-hidden">
            <main class="flex-1 overflow-y-auto p-4 md:p-6 bg-gray-100">
                <h1 class="text-2xl font-bold text-gray-800 mb-6">Add Student</h1>
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <form action="{{ route('students.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Name</label>
                            <input type="text" name="name" id="name" class="w-full p-2 border rounded-lg text-sm" required>
                            @error('name')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                            <input type="email" name="email" id="email" class="w-full p-2 border rounded-lg text-sm" required>
                            @error('email')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="student_id" class="block text-sm font-semibold text-gray-700 mb-2">Student ID</label>
                            <input type="text" name="student_id" id="student_id" class="w-full p-2 border rounded-lg text-sm" required>
                            @error('student_id')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="phone" class="block text-sm font-semibold text-gray-700 mb-2">Phone</label>
                            <input type="text" name="phone" id="phone" class="w-full p-2 border rounded-lg text-sm">
                            @error('phone')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="class" class="block text-sm font-semibold text-gray-700 mb-2">Class</label>
                            <input type="text" name="class" id="class" class="w-full p-2 border rounded-lg text-sm">
                            @error('class')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">Password</label>
                            <input type="password" name="password" id="password" class="w-full p-2 border rounded-lg text-sm" required>
                            @error('password')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-blue-700">Add Student</button>
                    </form>
                </div>
            </main>
        </div>
    </div>
</body>
</html>