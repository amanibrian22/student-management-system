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
                            <label for="class_id" class="block text-sm text-gray-700 font-semibold mb-2">Class</label>
                            <select name="class_id" id="class_id" class="w-full p-2 border rounded-lg text-sm" required>
                                <option value="">Select Class</option>
                                @foreach($classes as $class)
                                    <option value="{{ $class->id }}" {{ $class->id == $timetable->class_id ? 'selected' : '' }}>{{ $class->name }}</option>
                                @endforeach
                            </select>
                            @error('class_id')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="subject" class="block text-sm text-gray-700 font-semibold mb-2">Subject</label>
                            <input type="text" name="subject" id="subject" class="w-full p-2 border rounded-lg text-sm" value="{{ old('subject', $timetable->subject) }}" required>
                            @error('subject')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="day" class="block text-sm text-gray-700 font-semibold mb-2">Day</label>
                            <select name="day" id="day" class="w-full p-2 border rounded-lg text-sm" required>
                                <option value="">Select Day</option>
                                <option value="Monday" {{ old('day', $timetable->day) == 'Monday' ? 'selected' : '' }}>Monday</option>
                                <option value="Tuesday" {{ old('day', $timetable->day) == 'Tuesday' ? 'selected' : '' }}>Tuesday</option>
                                <option value="Wednesday" {{ old('day', $timetable->day) == 'Wednesday' ? 'selected' : '' }}>Wednesday</option>
                                <option value="Thursday" {{ old('day', $timetable->day) == 'Thursday' ? 'selected' : '' }}>Thursday</option>
                                <option value="Friday" {{ old('day', $timetable->day) == 'Friday' ? 'selected' : '' }}>Friday</option>
                            </select>
                            @error('day')
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
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 text-sm">Update Timetable</button>
                        <a href="{{ route('timetables.index') }}" class="ml-4 text-gray-600 hover:text-gray-800 text-sm">Cancel</a>
                    </form>
                </div>
            </main>
        </div>
    </div>
</body>
</html>