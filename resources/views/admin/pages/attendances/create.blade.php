<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Attendance - AcademiTrack</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 font-sans">
    <div class="flex h-screen">
        @include('admin.sidebar')
        <div class="flex flex-col flex-1 overflow-hidden">
            <main class="flex-1 overflow-y-auto p-4 md:p-6 bg-gray-100">
                <h1 class="text-2xl font-bold text-gray-800 mb-6">Add Attendance</h1>
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <form action="{{ route('attendances.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="student_id" class="block text-sm text-gray-700 font-semibold mb-2">Student</label>
                            <select name="student_id" id="student_id" class="w-full p-2 border rounded-lg text-sm" required>
                                <option value="">Select Student</option>
                                @foreach($students as $student)
                                    <option value="{{ $student->id }}">{{ $student->name }} ({{ $student->student_id }})</option>
                                @endforeach
                            </select>
                            @error('student_id')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="date" class="block text-sm text-gray-700 font-semibold mb-2">Date</label>
                            <input type="date" name="date" id="date" class="w-full p-2 border rounded-lg text-sm" required>
                            @error('date')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="present" class="block text-sm text-gray-700 font-semibold mb-2">Status</label>
                            <select name="present" id="present" class="w-full p-2 border rounded-lg text-sm" required>
                                <option value="1">Present</option>
                                <option value="0">Absent</option>
                            </select>
                            @error('present')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="subject" class="block text-sm text-gray-700 font-semibold mb-2">Subject</label>
                            <input type="text" name="subject" id="subject" class="w-full p-2 border rounded-lg text-sm" maxlength="10" required>
                            @error('subject')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 text-sm">Create Attendance</button>
                    </form>
                </div>
            </main>
        </div>
    </div>
</body>
</html>