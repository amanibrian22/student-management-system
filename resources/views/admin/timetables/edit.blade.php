<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Timetable - AcademiTrack</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 font-sans">
    <div class="flex h-screen">
        @include('admin.sidebar')
        <div class="flex flex-col flex-1 overflow-hidden">
            <main class="flex-1 overflow-y-auto p-4 md:p-6 bg-gray-100">
                <h1 class="text-2xl font-bold text-gray-800 mb-6">Edit Timetable</h1>
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <form action="{{ route('timetables.update', $timetable) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="student_id" class="block text-sm text-gray-700 font-semibold mb-2">Student</label>
                            <select name="student_id" id="student_id" class="w-full p-2 border rounded-lg text-sm" required>
                                <option value="">Select Student</option>
                                @foreach($students as $student)
                                    <option value="{{ $student->id }}" {{ $student->id == $timetable->student_id ? 'selected' : '' }}>{{ $student->name }} ({{ $student->student_id }})</option>
                                @endforeach
                            </select>
                            @error('student_id')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="course_code" class="block text-sm text-gray-700 font-semibold mb-2">Course Code</label>
                            <input type="text" name="course_code" id="course_code" class="w-full p-2 border rounded-lg text-sm" value="{{ $timetable->course_code }}" required>
                            @error('course_code')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="course_name" class="block text-sm text-gray-700 font-semibold mb-2">Course Name</label>
                            <input type="text" name="course_name" id="course_name" class="w-full p-2 border rounded-lg text-sm" value="{{ $timetable->course_name }}" required>
                            @error('course_name')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="day_of_week" class="block text-sm text-gray-700 font-semibold mb-2">Day of Week</label>
                            <select name="day_of_week" id="day_of_week" class="w-full p-2 border rounded-lg text-sm" required>
                                <option value="">Select Day</option>
                                @foreach(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day)
                                    <option value="{{ $day }}" {{ $timetable->day_of_week == $day ? 'selected' : '' }}>{{ $day }}</option>
                                @endforeach
                            </select>
                            @error('day_of_week')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="start_time" class="block text-sm text-gray-700 font-semibold mb-2">Start Time</label>
                            <input type="time" name="start_time" id="start_time" class="w-full p-2 border rounded-lg text-sm" value="{{ $timetable->start_time }}" required>
                            @error('start_time')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="end_time" class="block text-sm text-gray-700 font-semibold mb-2">End Time</label>
                            <input type="time" name="end_time" id="end_time" class="w-full p-2 border rounded-lg text-sm" value="{{ $timetable->end_time }}" required>
                            @error('end_time')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="location" class="block text-sm text-gray-700 font-semibold mb-2">Location</label>
                            <input type="text" name="location" id="location" class="w-full p-2 border rounded-lg text-sm" value="{{ $timetable->location }}" required>
                            @error('location')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 text-sm">Update Timetable</button>
                    </form>
                </div>
            </main>
        </div>
    </div>
</body>
</html>