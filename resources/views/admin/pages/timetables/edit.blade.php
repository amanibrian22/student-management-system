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
                            <label for="class" class="block text-sm text-gray-700 font-semibold mb-2">Class</label>
                            <select name="class" id="class" class="w-full p-2 border rounded-lg text-sm" required>
                                <option value="">Select Class</option>
                                @foreach($classes as $class)
                                    <option value="{{ $class }}" {{ $class == $timetable->class ? 'selected' : '' }}>{{ $class }}</option>
                                @endforeach
                            </select>
                            @error('class')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="course_code" class="block text-sm text-gray-700 font-semibold mb-2">Course Code</label>
                            <input type="text" name="course_code" id="course_code" class="w-full p-2 border rounded-lg text-sm" value="{{ old('course_code', $timetable->course_code) }}" required>
                            @error('course_code')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="course_name" class="block text-sm text-gray-700 font-semibold mb-2">Course Name</label>
                            <input type="text" name="course_name" id="course_name" class="w-full p-2 border rounded-lg text-sm" value="{{ old('course_name', $timetable->course_name) }}" required>
                            @error('course_name')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="day_of_week" class="block text-sm text-gray-700 font-semibold mb-2">Day of Week</label>
                            <select name="day_of_week" id="day_of_week" class="w-full p-2 border rounded-lg text-sm" required>
                                <option value="">Select Day</option>
                                <option value="Monday" {{ $timetable->day_of_week == 'Monday' ? 'selected' : '' }}>Monday</option>
                                <option value="Tuesday" {{ $timetable->day_of_week == 'Tuesday' ? 'selected' : '' }}>Tuesday</option>
                                <option value="Wednesday" {{ $timetable->day_of_week == 'Wednesday' ? 'selected' : '' }}>Wednesday</option>
                                <option value="Thursday" {{ $timetable->day_of_week == 'Thursday' ? 'selected' : '' }}>Thursday</option>
                                <option value="Friday" {{ $timetable->day_of_week == 'Friday' ? 'selected' : '' }}>Friday</option>
                                <option value="Saturday" {{ $timetable->day_of_week == 'Saturday' ? 'selected' : '' }}>Saturday</option>
                                <option value="Sunday" {{ $timetable->day_of_week == 'Sunday' ? 'selected' : '' }}>Sunday</option>
                            </select>
                            @error('day_of_week')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="start_time" class="block text-sm text-gray-700 font-semibold mb-2">Start Time</label>
                            <input type="time" name="start_time" id="start_time" class="w-full p-2 border rounded-lg text-sm" value="{{ old('start_time', $timetable->start_time) }}" required>
                            @error('start_time')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="end_time" class="block text-sm text-gray-700 font-semibold mb-2">End Time</label>
                            <input type="time" name="end_time" id="end_time" class="w-full p-2 border rounded-lg text-sm" value="{{ old('end_time', $timetable->end_time) }}" required>
                            @error('end_time')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="location" class="block text-sm text-gray-700 font-semibold mb-2">Location</label>
                            <input type="text" name="location" id="location" class="w-full p-2 border rounded-lg text-sm" value="{{ old('location', $timetable->location) }}" required>
                            @error('location')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 text-sm">Update Timetable</button>
                        <a href="{{ route('timetables.index') }}" class="ml-4 text-gray-600 hover:text-gray-800 text-sm">Cancel</a>
                    </form>
                </div>
            </main>
        </div>
    </div>
</body>
</html>