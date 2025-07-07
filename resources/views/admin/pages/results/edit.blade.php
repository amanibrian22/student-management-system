<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Result - AcademiTrack</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 font-sans">
    <div class="flex h-screen">
        @include('admin.sidebar')
        <div class="flex flex-col flex-1 overflow-hidden">
            <main class="flex-1 overflow-y-auto p-4 md:p-6 bg-gray-100">
                <h1 class="text-2xl font-bold text-gray-800 mb-6">Edit Result</h1>
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <form action="{{ route('results.update', $result) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="student_id" class="block text-sm text-gray-700 font-semibold mb-2">Student</label>
                            <select name="student_id" id="student_id" class="w-full p-2 border rounded-lg text-sm" required>
                                <option value="">Select Student</option>
                                @foreach($students as $student)
                                    <option value="{{ $student->id }}" {{ $student->id == $result->student_id ? 'selected' : '' }}>{{ $student->name }} ({{ $student->student_id }})</option>
                                @endforeach
                            </select>
                            @error('student_id')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="course_code" class="block text-sm text-gray-700 font-semibold mb-2">Course Code</label>
                            <input type="text" name="course_code" id="course_code" class="w-full p-2 border rounded-lg text-sm" value="{{ old('course_code', $result->course_code) }}" maxlength="10" required>
                            @error('course_code')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="course_name" class="block text-sm text-gray-700 font-semibold mb-2">Course Name</label>
                            <input type="text" name="course_name" id="course_name" class="w-full p-2 border rounded-lg text-sm" value="{{ old('course_name', $result->course_name) }}" required>
                            @error('course_name')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="grade" class="block text-sm text-gray-700 font-semibold mb-2">Grade</label>
                            <input type="text" name="grade" id="grade" class="w-full p-2 border rounded-lg text-sm" value="{{ old('grade', $result->grade) }}" maxlength="5" required>
                            @error('grade')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="percentage" class="block text-sm text-gray-700 font-semibold mb-2">Percentage</label>
                            <input type="number" name="percentage" id="percentage" class="w-full p-2 border rounded-lg text-sm" value="{{ old('percentage', $result->percentage) }}" min="0" max="100" step="0.01" required>
                            @error('percentage')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="exam_date" class="block text-sm text-gray-700 font-semibold mb-2">Exam Date</label>
                            <input type="date" name="exam_date" id="exam_date" class="w-full p-2 border rounded-lg text-sm" value="{{ old('exam_date', $result->exam_date ? $result->exam_date->format('Y-m-d') : '') }}" required>
                            @error('exam_date')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 text-sm">Update Result</button>
                        <a href="{{ route('results.index') }}" class="ml-4 text-gray-600 hover:text-gray-800 text-sm">Cancel</a>
                    </form>
                </div>
            </main>
        </div>
    </div>
</body>
</html>