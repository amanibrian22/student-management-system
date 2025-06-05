<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - AcademiTrack</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen font-sans">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <div class="flex justify-center mb-6">
            <img src="/images/logo.png" alt="AcademiTrack Logo" class="h-16 w-16 rounded-full">
        </div>
        <h2 class="text-2xl font-bold text-gray-800 text-center mb-6">Admin Login</h2>
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded mb-4 text-sm">
                {{ $errors->first('email') }}
            </div>
        @endif
        <form action="{{ route('admin.login.post') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                <input type="email" name="email" id="email" class="w-full p-2 border rounded-lg text-sm" value="{{ old('email') }}" required>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">Password</label>
                <input type="password" name="password" id="password" class="w-full p-2 border rounded-lg text-sm" required>
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white p-2 rounded-lg hover:bg-blue-700 text-sm">Login</button>
        </form>
    </div>
</body>
</html>