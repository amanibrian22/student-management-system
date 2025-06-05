<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduConnect - Student Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .login-bg {
            background-image: url('/img/home.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        .login-overlay {
            background-color: rgba(59, 130, 246, 0.85);
        }
        .login-card {
            backdrop-filter: blur(8px);
            background-color: rgba(255, 255, 255, 0.9);
        }
        .input-focus:focus {
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.3);
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center login-bg">
    <div class="absolute inset-0 login-overlay"></div>
    
    <div class="relative w-full max-w-md mx-4">
        <div class="login-card p-8 rounded-xl shadow-2xl border border-white border-opacity-20">
            <!-- Logo -->
            <div class="flex justify-center mb-6">
                <div class="flex items-center">
                    <img src="/img/home.png" alt="School Logo" class="h-12 w-12 mr-3 rounded-full border-2 border-white">
                    <span class="text-2xl font-bold text-blue-800">EduConnect</span>
                </div>
            </div>
            
            <h2 class="text-2xl font-bold text-center text-gray-800 mb-2">Student Login</h2>
            <p class="text-center text-gray-600 mb-6">Access your academic dashboard</p>
            
            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-6 flex items-start">
                    <i class="fas fa-exclamation-circle mt-1 mr-2"></i>
                    <div>
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                </div>
            @endif
            
            <form action="{{ route('login.submit') }}" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="email" class="block text-gray-700 font-medium mb-2">
                        <i class="fas fa-envelope mr-2 text-blue-600"></i>Email Address
                    </label>
                    <input type="email" name="email" id="email" 
                           class="w-full p-3 border border-gray-300 rounded-lg input-focus transition 
                                  focus:outline-none focus:border-blue-500" 
                           required placeholder="student@school.edu">
                </div>
                
                <div class="mb-6">
                    <label for="password" class="block text-gray-700 font-medium mb-2">
                        <i class="fas fa-lock mr-2 text-blue-600"></i>Password
                    </label>
                    <input type="password" name="password" id="password" 
                           class="w-full p-3 border border-gray-300 rounded-lg input-focus transition 
                                  focus:outline-none focus:border-blue-500" 
                           required placeholder="••••••••">
                </div>
                
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center">
                        <input type="checkbox" id="remember" name="remember" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                        <label for="remember" class="ml-2 block text-sm text-gray-700">Remember me</label>
                    </div>
                    <a href="#" class="text-sm text-blue-600 hover:text-blue-800">Forgot password?</a>
                </div>
                
                <button type="submit" class="w-full bg-blue-600 text-white p-3 rounded-lg hover:bg-blue-700 
                                            transition duration-300 flex items-center justify-center">
                    <i class="fas fa-sign-in-alt mr-2"></i> Login to Portal
                </button>
            </form>
            
            <div class="mt-6 text-center">
                <p class="text-gray-600 text-sm">Need help? 
                    <a href="#" class="text-blue-600 hover:text-blue-800 font-medium">Contact support</a>
                </p>
            </div>
        </div>
        
        <div class="mt-6 text-center text-white">
            <p class="text-sm">© 2023 EduConnect School Portal. All rights reserved.</p>
        </div>
    </div>

    <script>
        // Simple animation on load
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            form.classList.add('opacity-0');
            setTimeout(() => {
                form.classList.remove('opacity-0');
                form.classList.add('opacity-100');
            }, 100);
        });
    </script>
</body>
</html>