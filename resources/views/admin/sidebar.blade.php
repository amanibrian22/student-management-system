<div class="hidden md:flex md:flex-shrink-0">
    <div class="flex flex-col w-64 bg-blue-800 text-white">
        <div class="flex items-center justify-center h-16 px-4 border-b border-blue-700">
            <img src="/img/logo.jpg" alt="AcademiTrack Logo" class="h-10 w-10 rounded-full">
            <span class="ml-3 text-xl font-bold">Educonnect</span>
        </div>
        <nav class="flex-1 space-y-2 px-4 py-4">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-3 text-sm font-medium rounded-lg {{ request()->routeIs('admin.dashboard') ? 'bg-blue-700 text-white' : 'text-blue-100 hover:bg-blue-700 hover:text-white' }}">
                <i class="fas fa-tachometer-alt mr-3"></i> Dashboard
            </a>
            <a href="{{ route('students.index') }}" class="flex items-center px-4 py-3 text-sm font-medium rounded-lg {{ request()->routeIs('students.*') ? 'bg-blue-700 text-white' : 'text-blue-100 hover:bg-blue-700 hover:text-white' }}">
                <i class="fas fa-users mr-3"></i> Students
            </a>
            <a href="{{ route('timetables.index') }}" class="flex items-center px-4 py-3 text-sm font-medium rounded-lg {{ request()->routeIs('timetables.*') ? 'bg-blue-700 text-white' : 'text-blue-100 hover:bg-blue-700 hover:text-white' }}">
                <i class="fas fa-calendar-alt mr-3"></i> Timetables
            </a>
            <a href="{{ route('attendances.index') }}" class="flex items-center px-4 py-3 text-sm font-medium rounded-lg {{ request()->routeIs('attendances.*') ? 'bg-blue-700 text-white' : 'text-blue-100 hover:bg-blue-700 hover:text-white' }}">
                <i class="fas fa-check-circle mr-3"></i> Attendance
            </a>
            <a href="{{ route('results.index') }}" class="flex items-center px-4 py-3 text-sm font-medium rounded-lg {{ request()->routeIs('results.*') ? 'bg-blue-700 text-white' : 'text-blue-100 hover:bg-blue-700 hover:text-white' }}">
                <i class="fas fa-chart-bar mr-3"></i> Results
            </a>
            <a href="{{ route('announcements.index') }}" class="flex items-center px-4 py-3 text-sm font-medium rounded-lg {{ request()->routeIs('announcements.*') ? 'bg-blue-700 text-white' : 'text-blue-100 hover:bg-blue-700 hover:text-white' }}">
                <i class="fas fa-bullhorn mr-3"></i> Announcements
            </a>
            <a href="{{ route('private_announcements.index') }}" class="flex items-center px-4 py-3 text-sm font-medium rounded-lg {{ request()->routeIs('private_announcements.*') ? 'bg-blue-700 text-white' : 'text-blue-100 hover:bg-blue-700 hover:text-white' }}">
                <i class="fas fa-lock mr-3"></i> Private Announcements
            </a>
            {{-- <a href="{{ route('admin.feedback.index') }}" class="flex items-center px-4 py-3 text-sm font-medium rounded-lg {{ request()->routeIs('admin.feedback.*') ? 'bg-blue-700 text-white' : 'text-blue-100 hover:bg-blue-700 hover:text-white' }}">
                <i class="fas fa-comment mr-3"></i> Feedback
            </a> --}}
        </nav>
        <div class="mt-auto pb-4 px-4">
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full flex items-center px-4 py-3 text-sm font-medium rounded-lg text-blue-100 hover:bg-blue-700 hover:text-white">
                    <i class="fas fa-sign-out-alt mr-2"></i> Logout
                </button>
            </form>
        </div>
    </div>
</div>