<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="shortcut icon" href="img/logo.jpg" type="image/x-icon">
    <style>
        .feedback-card {
            transition: all 0.3s ease;
        }
        .feedback-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
        }
        textarea {
            min-height: 120px;
        }
    </style>
</head>
<body class="bg-gray-50 font-sans">
    <div class="flex h-screen">
        @include('student.sidebar')
        <div class="flex flex-col flex-1 overflow-hidden">
            <main class="flex-1 overflow-y-auto p-4 md:p-8">
                <div class="flex items-center justify-between mb-8">
                    <div>
                        <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Feedback</h1>
                        <p class="text-gray-500 mt-1">Share your thoughts with us</p>
                    </div>
                    <div class="h-10 w-10 bg-blue-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-comment-dots text-blue-600"></i>
                    </div>
                </div>

                @if(session('success'))
                    <div class="feedback-card bg-green-50 border border-green-200 rounded-lg p-4 mb-6 flex items-start">
                        <div class="mr-3 mt-0.5">
                            <i class="fas fa-check-circle text-green-500"></i>
                        </div>
                        <div>
                            <h3 class="font-medium text-green-800">Success!</h3>
                            <p class="text-green-600 text-sm">{{ session('success') }}</p>
                        </div>
                    </div>
                @endif

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <div class="feedback-card bg-white rounded-xl shadow-md p-6 border border-gray-100">
                        <h2 class="text-lg font-semibold text-gray-700 mb-4">Send Feedback</h2>
                        <form action="{{ route('feedback.store') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Your Feedback</label>
                                <textarea name="content" id="content" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required></textarea>
                                @error('content')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <button type="submit" class="w-full bg-blue-600 text-white px-4 py-3 rounded-lg hover:bg-blue-700 transition-colors flex items-center justify-center">
                                <i class="fas fa-paper-plane mr-2"></i> Send Feedback
                            </button>
                        </form>
                    </div>

                    <div class="feedback-card bg-white rounded-xl shadow-md p-6 border border-gray-100">
                        <h2 class="text-lg font-semibold text-gray-700 mb-4">Sent Feedback</h2>
                        @if($feedbacks->isEmpty())
                            <div class="text-center py-8">
                                <i class="fas fa-inbox text-3xl text-gray-300 mb-3"></i>
                                <p class="text-gray-500">No feedback sent yet</p>
                            </div>
                        @else
                            <ul class="divide-y divide-gray-100 max-h-[400px] overflow-y-auto">
                                @foreach($feedbacks as $feedback)
                                <li class="py-4">
                                    <div class="flex items-start">
                                        <div class="mr-3 mt-0.5">
                                            <i class="fas fa-comment text-blue-400"></i>
                                        </div>
                                        <div class="flex-1">
                                            <p class="text-gray-700">{{ $feedback->content }}</p>
                                            <div class="mt-2 text-xs text-gray-500">
                                                <i class="far fa-clock mr-1"></i> Sent: 
                                                @if($feedback->submitted_at instanceof \Illuminate\Support\Carbon)
                                                    {{ $feedback->submitted_at->format('M d, Y \a\t h:i A') }}
                                                @else
                                                    {{ $feedback->submitted_at }}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>