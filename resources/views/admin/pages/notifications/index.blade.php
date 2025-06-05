<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Notifications - AcademiTrack</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 font-sans">
    <div class="flex h-screen">
        @include('admin.sidebar')
        <div class="flex flex-col flex-1 overflow-hidden">
            <main class="flex-1 overflow-y-auto p-4 md:p-6 bg-gray-100">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-bold text-gray-800">Manage Announcements</h1>
                    <a href="{{ route('notifications.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 text-sm">Add Announcement</a>
                </div>
                @if (session('success'))
                    <div class="bg-green-100 text-green-500 p-4 rounded-lg mb-6 text-sm">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="bg-white rounded-lg shadow-lg p-6">
                    @if($announcements->isEmpty())
                        <p class="text-gray-600 text-sm">No announcements found.</p>
                    @else
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600">Title</th>
                                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600">Post</th>
                                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600">Posted</th>
                                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($announcements as $announcement)
                                    <tr>
                                        <td class="px-4 py-2 text-sm text-gray-800">{{ $announcement->title }}</td>
                                        <td class="px-4 py-2 text-sm text-gray-800">{{ \Illuminate\Support\Str::limit($announcement->content, 50) }}</td>
                                        <td class="px-4 py-2 text-sm text-gray-800">{{ $announcement->posted_date }}</td>
                                        <td class="px-4 py-2 text-sm">
                                            <a href="{{ route('announcements.edit', $announcement) }}" class="text-blue-600 hover:text-blue-500 mr-2"><i class="fas fa-edit"></i></a>
                                            <form action="{{ route('announcements.destroy', $announcement) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-500" onclick="return confirm('Are you sure you want to delete this announcement?')"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </main>
        </div>
    </div>
</body>
</html>