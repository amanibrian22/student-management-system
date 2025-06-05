<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Comment - AcademiTrack</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 font-sans">
    <div class="flex h-screen">
        @include('admin.sidebar')
        <div class="flex flex-col flex-1 overflow-hidden">
            <main class="flex-1 overflow-y-auto p-4 md:p-6 bg-gray-100">
                <h1 class="text-2xl font-bold text-gray-800 mb-6">Edit Comment</h1>
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <form action="{{ route('comments.update', $comment) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="student_name" class="block text-sm text-gray-700 font-semibold mb-2">Student Name</label>
                            <input type="text" name="student_name" id="student_name" class="w-full p-2 border rounded-lg text-sm" value="{{ old('student_name', $comment->student_name) }}" required>
                            @error('student_name')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @error
                        </div>
                        <div class="mb-4">
                            <label for="content" class="block text-sm text-gray-700 font-semibold mb-2">Comment</label>
                            <textarea name="content" id="content" class="w-full p-2 border rounded-lg text-sm" rows="5" required>{{ old('content', $comment->content) }}</textarea>
                            @error('content')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @error
                        </div>
                        <div class="mb-4">
                            <label for="posted_date" class="block text-sm text-gray-700 font-semibold mb-2">Posted Date</label>
                            <input type="date" name="posted_date" id="posted_date" class="w-full p-2 border rounded-lg text-sm" value="{{ old('posted_date', $comment->posted_date) }}" required>
                            @error('posted_date')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @error
                        </div>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 text-sm">Update Comment</button>
                        <a href="{{ route('comments.index') }}" class="ml-4 text-gray-600 hover:text-gray-800 text-sm">Cancel</a>
                    </form>
                </div>
            </main>
        </div>
    </div>
</body>
</html>