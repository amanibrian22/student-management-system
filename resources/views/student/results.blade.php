<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Results - AcademiTrack</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="shortcut icon" href="img/logo.jpg" type="image/x-icon">
    <style>
        .grade-A { background-color: #d1fae5; color: #065f46; }
        .grade-B { background-color: #dbeafe; color: #1e40af; }
        .grade-C { background-color: #fef3c7; color: #92400e; }
        .grade-D { background-color: #fee2e2; color: #991b1b; }
        .grade-F { background-color: #f3f4f6; color: #6b7280; }
    </style>
</head>
<body class="bg-gray-50 font-sans">
    <div class="flex h-screen">
        @include('student.sidebar')
        <div class="flex flex-col flex-1 overflow-hidden">
            <main class="flex-1 overflow-y-auto p-4 md:p-8">
                <div class="flex items-center justify-between mb-8">
                    <div>
                        <h1 class="text-2xl md:text-3xl font-bold text-gray-800">My Results</h1>
                        <p class="text-gray-500 mt-1">Academic performance overview</p>
                    </div>
                    <div class="h-10 w-10 bg-blue-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-chart-line text-blue-600"></i>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100">
                    @if($results->isEmpty())
                        <div class="p-8 text-center">
                            <i class="fas fa-clipboard-list text-4xl text-gray-300 mb-4"></i>
                            <p class="text-gray-500">No results found</p>
                        </div>
                    @else
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Course</th>
                                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Grade</th>
                                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Percentage</th>
                                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Exam Date</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-100">
                                    @foreach($results as $result)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-gray-800 font-medium">{{ $result->course_name }}</div>
                                            <div class="text-gray-500 text-sm">{{ $result->course_code }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-3 py-1 rounded-full text-sm font-semibold grade-{{ $result->grade }}">{{ $result->grade }}</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="w-16 bg-gray-200 rounded-full h-2 mr-2">
                                                    <div class="bg-blue-500 h-2 rounded-full" style="width: {{ $result->percentage }}%"></div>
                                                </div>
                                                <span>{{ $result->percentage }}%</span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-gray-500">
                                            @if($result->exam_date instanceof \Illuminate\Support\Carbon)
                                                {{ $result->exam_date->format('M d, Y') }}
                                            @else
                                                {{ $result->exam_date }}
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