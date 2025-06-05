<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance - AcademiTrack</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="shortcut icon" href="img/logo.jpg" type="image/x-icon">
    <style>
        .attendance-progress {
            height: 8px;
        }
        .present-badge { background-color: #d1fae5; color: #065f46; }
        .absent-badge { background-color: #fee2e2; color: #991b1b; }
    </style>
</head>
<body class="bg-gray-50 font-sans">
    <div class="flex h-screen">
        @include('student.sidebar')
        <div class="flex flex-col flex-1 overflow-hidden">
            <main class="flex-1 overflow-y-auto p-4 md:p-8">
                <div class="flex items-center justify-between mb-8">
                    <div>
                        <h1 class="text-2xl md:text-3xl font-bold text-gray-800">My Attendance</h1>
                        <p class="text-gray-500 mt-1">Class participation records</p>
                    </div>
                    <div class="h-10 w-10 bg-blue-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-user-check text-blue-600"></i>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div class="bg-white rounded-xl shadow-md p-6 border border-gray-100">
                        <h2 class="text-lg font-semibold text-gray-700 mb-4">Attendance Rate</h2>
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-3xl font-bold text-blue-600">{{ number_format($attendanceRate, 1) }}%</span>
                            <span class="text-sm text-gray-500">Overall</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full attendance-progress">
                            <div class="bg-blue-500 h-full rounded-full" style="width: {{ $attendanceRate }}%"></div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-md p-6 border border-gray-100">
                        <h2 class="text-lg font-semibold text-gray-700 mb-4">Attendance Summary</h2>
                        <div class="flex justify-between">
                            <div class="text-center">
                                <div class="text-2xl font-bold text-green-600">
                                    {{ $attendances->where('present', true)->count() }}
                                </div>
                                <div class="text-sm text-gray-500">Present</div>
                            </div>
                            <div class="text-center">
                                <div class="text-2xl font-bold text-red-600">
                                    {{ $attendances->where('present', false)->count() }}
                                </div>
                                <div class="text-sm text-gray-500">Absent</div>
                            </div>
                            <div class="text-center">
                                <div class="text-2xl font-bold text-gray-600">
                                    {{ $attendances->count() }}
                                </div>
                                <div class="text-sm text-gray-500">Total</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100">
                    @if($attendances->isEmpty())
                        <div class="p-8 text-center">
                            <i class="fas fa-user-clock text-4xl text-gray-300 mb-4"></i>
                            <p class="text-gray-500">No attendance records found</p>
                        </div>
                    @else
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Date</th>
                                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Course</th>
                                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-100">
                                    @foreach($attendances as $attendance)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 whitespace-nowrap text-gray-700">
                                            {{ $attendance->date }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-gray-800 font-medium">{{ $attendance->course_code }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if($attendance->present)
                                                <span class="px-3 py-1 rounded-full text-sm font-semibold present-badge">
                                                    <i class="fas fa-check mr-1"></i> Present
                                                </span>
                                            @else
                                                <span class="px-3 py-1 rounded-full text-sm font-semibold absent-badge">
                                                    <i class="fas fa-times mr-1"></i> Absent
                                                </span>
                                            @endif
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