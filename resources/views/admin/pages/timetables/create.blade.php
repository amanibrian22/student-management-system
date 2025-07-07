<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Timetable - AcademiTrack</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 font-sans">
    <div class="flex h-screen">
        @include('admin.sidebar')
        <div class="flex flex-col flex-1 overflow-hidden">
            <main class="flex-1 overflow-y-auto p-4 md:p-6 bg-gray-100">
                <h1 class="text-2xl font-bold text-gray-800 mb-6">Add Timetable</h1>
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <form action="{{ route('timetables.store') }}" method="POST">
                        @csrf
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600">Class</th>
                                        <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600">Course Code</th>
                                        <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600">Course Name</th>
                                        <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600">Day</th>
                                        <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600">Start Time</th>
                                        <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600">End Time</th>
                                        <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600">Location</th>
                                        <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="timetable-rows" class="divide-y divide-gray-100">
                                    <tr class="timetable-row">
                                        <td class="px-4 py-2">
                                            <select name="timetables[0][class]" class="w-full p-2 border rounded-lg text-sm" required>
                                                <option value="">Select Class</option>
                                                @foreach($classes as $class)
                                                    <option value="{{ $class }}">{{ $class }}</option>
                                                @endforeach
                                            </select>
                                            @error('timetables.0.class')
                                                <p class="text-red-500 text-sm">{{ $message }}</p>
                                            @enderror
                                        </td>
                                        <td class="px-4 py-2">
                                            <input type="text" name="timetables[0][course_code]" class="w-full p-2 border rounded-lg text-sm" maxlength="10" required>
                                            @error('timetables.0.course_code')
                                                <p class="text-red-500 text-sm">{{ $message }}</p>
                                            @enderror
                                        </td>
                                        <td class="px-4 py-2">
                                            <input type="text" name="timetables[0][course_name]" class="w-full p-2 border rounded-lg text-sm" required>
                                            @error('timetables.0.course_name')
                                                <p class="text-red-500 text-sm">{{ $message }}</p>
                                            @enderror
                                        </td>
                                        <td class="px-4 py-2">
                                            <select name="timetables[0][day_of_week]" class="w-full p-2 border rounded-lg text-sm" required>
                                                <option value="">Select Day</option>
                                                <option value="Monday">Monday</option>
                                                <option value="Tuesday">Tuesday</option>
                                                <option value="Wednesday">Wednesday</option>
                                                <option value="Thursday">Thursday</option>
                                                <option value="Friday">Friday</option>
                                                <option value="Saturday">Saturday</option>
                                                <option value="Sunday">Sunday</option>
                                            </select>
                                            @error('timetables.0.day_of_week')
                                                <p class="text-red-500 text-sm">{{ $message }}</p>
                                            @enderror
                                        </td>
                                        <td class="px-4 py-2">
                                            <input type="time" name="timetables[0][start_time]" class="w-full p-2 border rounded-lg text-sm" required>
                                            @error('timetables.0.start_time')
                                                <p class="text-red-500 text-sm">{{ $message }}</p>
                                            @enderror
                                        </td>
                                        <td class="px-4 py-2">
                                            <input type="time" name="timetables[0][end_time]" class="w-full p-2 border rounded-lg text-sm" required>
                                            @error('timetables.0.end_time')
                                                <p class="text-red-500 text-sm">{{ $message }}</p>
                                            @enderror
                                        </td>
                                        <td class="px-4 py-2">
                                            <input type="text" name="timetables[0][location]" class="w-full p-2 border rounded-lg text-sm" maxlength="50" required>
                                            @error('timetables.0.location')
                                                <p class="text-red-500 text-sm">{{ $message }}</p>
                                            @enderror
                                        </td>
                                        <td class="px-4 py-2">
                                            <button type="button" class="text-red-600 hover:text-red-900 remove-row"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <button type="button" id="add-row" class="mt-4 bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 text-sm"><i class="fas fa-plus mr-2"></i>Add Row</button>
                        <button type="submit" class="mt-4 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 text-sm">Create Timetable</button>
                        <a href="{{ route('timetables.index') }}" class="mt-4 ml-4 text-gray-600 hover:text-gray-800 text-sm">Cancel</a>
                    </form>
                </div>
            </main>
        </div>
    </div>
    <script>
        document.getElementById('add-row').addEventListener('click', function() {
            const tbody = document.getElementById('timetable-rows');
            const rowCount = tbody.children.length;
            const newRow = document.createElement('tr');
            newRow.className = 'timetable-row';
            newRow.innerHTML = `
                <td class="px-4 py-2">
                    <select name="timetables[${rowCount}][class]" class="w-full p-2 border rounded-lg text-sm" required>
                        <option value="">Select Class</option>
                        @foreach($classes as $class)
                            <option value="{{ $class }}">{{ $class }}</option>
                        @endforeach
                    </select>
                </td>
                <td class="px-4 py-2">
                    <input type="text" name="timetables[${rowCount}][course_code]" class="w-full p-2 border rounded-lg text-sm" maxlength="10" required>
                </td>
                <td class="px-4 py-2">
                    <input type="text" name="timetables[${rowCount}][course_name]" class="w-full p-2 border rounded-lg text-sm" required>
                </td>
                <td class="px-4 py-2">
                    <select name="timetables[${rowCount}][day_of_week]" class="w-full p-2 border rounded-lg text-sm" required>
                        <option value="">Select Day</option>
                        <option value="Monday">Monday</option>
                        <option value="Tuesday">Tuesday</option>
                        <option value="Wednesday">Wednesday</option>
                        <option value="Thursday">Thursday</option>
                        <option value="Friday">Friday</option>
                        <option value="Saturday">Saturday</option>
                        <option value="Sunday">Sunday</option>
                    </select>
                </td>
                <td class="px-4 py-2">
                    <input type="time" name="timetables[${rowCount}][start_time]" class="w-full p-2 border rounded-lg text-sm" required>
                </td>
                <td class="px-4 py-2">
                    <input type="time" name="timetables[${rowCount}][end_time]" class="w-full p-2 border rounded-lg text-sm" required>
                </td>
                <td class="px-4 py-2">
                    <input type="text" name="timetables[${rowCount}][location]" class="w-full p-2 border rounded-lg text-sm" maxlength="50" required>
                </td>
                <td class="px-4 py-2">
                    <button type="button" class="text-red-600 hover:text-red-900 remove-row"><i class="fas fa-trash"></i></button>
                </td>
            `;
            tbody.appendChild(newRow);
        });

        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-row') || e.target.closest('.remove-row')) {
                const row = e.target.closest('tr');
                if (document.querySelectorAll('.timetable-row').length > 1) {
                    row.remove();
                }
            }
        });
    </script>
</body>
</html>