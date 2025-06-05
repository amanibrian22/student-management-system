<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Feedback - AcademiTrack</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 font-sans">
    <div class="flex h-screen">
        @include('admin.sidebar')
        <div class="flex flex-col flex-1 overflow-hidden">
            <main class="flex-1 overflow-y-auto p-4 md:p-6 bg-gray-100">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-bold text-gray-800">Manage Feedback</h1>
                    <a href="{{ route('feedback.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 text-sm">Add Feedback</a>
                </div>
                @if (session('success'))
                    <div class="bg-green-100 text-green-700 p-4 rounded mb-4 text-sm">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="bg-white rounded-lg shadow-sm p-6">
                    @if($feedback->isEmpty())
                        <p class="text-gray-600 text-sm">No feedback found.</p>
                    @else
                        <table class="min-w-full">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2 text-left text-sm text-gray-600">Student</th>
                                    <th class="px-4 py-2 text-left text-sm text-gray-600">Comment</th>
                                    <th class="px-4 py-2 text-left text-sm text-gray-600">Submitted Date</th>
                                    <th class="px-4 py-2 text-left text-sm text-gray-600">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($feedback as $feedbackItem)
                                    <tr>
                                        <td class="px-4 py-2 text-sm">{{ $feedbackItem->student->name ?? 'N/A' }}</td>
                                        <td class="px-4 py-2 text-sm">{{ \Illuminate\Support\Str::limit($feedbackItem->comment, 50) }}</td>
                                        <td class="px-4 py-2 text-sm">{{ $feedbackItem->submitted_date }}</td>
                                        <td class="px-4 py-2 text-sm">
                                            <a href="{{ route('feedback.edit', $feedbackItem) }}" class="text-blue-600 hover:text-blue-500 mr-2"><i class="fas fa-edit"></i></a>
                                            <form action="{{ route('feedback.destroy', $feedbackItem) }}" method="POST vouint64">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-500" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        @endif
                    </div>
                </main>
            </div>
        </div>
    </body>
</html>