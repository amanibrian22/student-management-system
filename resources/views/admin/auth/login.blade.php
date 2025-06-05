<!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>EduTrack - Admin Login</title>
      <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  </head>
  <body class="bg-gray-50 flex items-center justify-center min-h-screen">
      <div class="bg-white rounded-xl shadow-md p-8 w-full max-w-md">
          <div class="flex items-center justify-center mb-6">
              <img src="/images/school-logo.png" alt="School Logo" class="h-12 w-12 rounded-full">
              <span class="ml-3 text-2xl font-bold text-gray-800">EduTrack Admin</span>
          </div>
          <h2 class="text-xl font-semibold text-gray-800 mb-6 text-center">Admin Login</h2>
          @if ($errors->has('email'))
              <div class="bg-red-100 text-red-700 p-3 rounded mb-4">{{ $errors->first('email') }}</div>
          @endif
          <form action="{{ route('admin.login') }}" method="POST">
              @csrf
              <div class="mb-4">
                  <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                  <input type="email" name="email" id="email" class="mt-1 block w-full p-3 border rounded-lg" required>
              </div>
              <div class="mb-4">
                  <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                  <input type="password" name="password" id="password" class="mt-1 block w-full p-3 border rounded-lg" required>
              </div>
              <button type="submit" class="w-full bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700">
                  <i class="fas fa-sign-in-alt mr-2"></i> Login
              </button>
          </form>
      </div>
  </body>
  </html>