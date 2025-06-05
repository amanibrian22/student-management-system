<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Timetables - AcademiTrack</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .day-badge {
            padding: 0.25rem 0.5rem;
            border-radius: 0.25rem;
            font-size: 0.75rem;
            font-weight: 500;
        }
        
        .day-monday { background-color: #dbeafe; color: #1d4ed8; }
        .day-tuesday { background-color: #e9d5ff; color: #7e22ce; }
        .day-wednesday { background-color: #fef3c7; color: #b45309; }
        .day-thursday { background-color: #bae6fd; color: #0369a1; }
        .day-friday { background-color: #a7f3d0; color: #047857; }
        .day-saturday { background-color: #fecaca; color: #b91c1c; }
        .day-sunday { background-color: #fbcfe8; color: #be185d; }
    </style>
</head>
<body class="bg-gray-50 font-sans">
    <div class="flex h-screen">
        @include('admin.sidebar')
        <div class="flex flex-col flex-1 overflow-hidden">
            <main class="flex-1 overflow-y-auto p-6">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
                    <div>
                        <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Manage Timetables</h1>
                        <p class="text-gray-500 mt-1">Class schedules and timings</p>
                    </div>
                    <a href="{{ route('timetables.create') }}" class="mt-4 md:mt-0 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors flex items-center">
                        <i class="fas fa-plus mr-2"></i> Add Timetable
                    </a>
                </div>

                @if (session('success'))
                    <div class="bg-green-50 border-l-4 border-green-500 p-4 mb-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 text-green-500">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-green-700">{{ session('success') }}</p>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100">
                    @if($timetables->isEmpty())
                        <div class="p-8 text-center">
                            <i class="fas fa-calendar-times text-4xl text-gray-300 mb-4"></i>
                            <p class="text-gray-500">No timetables found</p>
                        </div>
                    @else
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Class</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Subject</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Day</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Time</th>
                                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-100">
                                    @foreach($timetables as $timetable)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $timetable->class_name ?? 'N/A' }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $timetable->subject }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="day-badge day-{{ strtolower($timetable->day) }}">
                                                {{ $timetable->day }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $timetable->start_time }} - {{ $timetable->end_time }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <div class="flex justify-end space-x-2">
                                                <a href="{{ route('timetables.edit', $timetable) }}" class="text-blue-600 hover:text-blue-900" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('timetables.destroy', $timetable) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-900" title="Delete" onclick="return confirm('Are you sure you want to delete this timetable?')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </main>
        </div>
    </div>
</body>
</html>