<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Announcement - AcademiTrack</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 font-sans">
    <div class="flex h-screen">
        @include('admin.sidebar')
        <div class="flex flex-col flex-1 overflow-hidden">
            <main class="flex-1 overflow-y-auto p-4 md:p-6 bg-gray-100">
                <h1 class="text-2xl font-bold text-gray-800 mb-6">Edit Announcement</h1>
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <form action="{{ route('announcements.update', $announcement) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="title" class="block text-sm text-gray-700 font-semibold mb-2">Title</label>
                            <input type="text" name="title" id="title" class="w-full p-2 border rounded-lg text-sm" value="{{ $announcement->title }}" required>
                            @error('title')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="content" class="block text-sm text-gray-700 font-semibold mb-2">Content</label>
                            <textarea name="content" id="content" class="w-full p-2 border rounded-lg text-sm" rows="5" required>{{ $announcement->content }}</textarea>
                            @error('content')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="posted_date" class="block text-sm text-gray-700 font-semibold mb-2">Posted Date</label>
                            <input type="date" name="posted_date" id="posted_date" class="w-full p-2 border rounded-lg text-sm" value="{{ $announcement->posted_date }}" required>
                            @error('posted_date')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 text-sm">Update Announcement</button>
                    </form>
                </div>
            </main>
        </div>
    </div>
</body>
</html>