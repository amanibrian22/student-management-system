<div class="hidden md:flex md:flex-shrink-0">
    <div class="flex flex-col w-64 bg-blue-800 text-white">
        <div class="flex items-center justify-center h-16 px-4 border-b border-blue-700">
            <img src="/img/logo.jpg" alt="AcademiTrack Logo" class="h-10 w-10 rounded-full">
            <span class="ml-3 text-xl font-bold">EduConnect</span>
        </div>
        <nav class="flex-1 space-y-2 px-4 py-4">
            <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-3 text-sm font-medium rounded-md {{ request()->routeIs('dashboard') ? 'bg-blue-700 text-white' : 'text-blue-100 hover:bg-blue-700 hover:text-white' }}">
                <i class="fas fa-tachometer-alt mr-3"></i> Dashboard
            </a>
            <a href="{{ route('profile') }}" class="flex items-center px-4 py-3 text-sm font-medium rounded-md {{ request()->routeIs('profile') ? 'bg-blue-700 text-white' : 'text-blue-100 hover:bg-blue-700 hover:text-white' }}">
                <i class="fas fa-user mr-3"></i> Profile
            </a>
            <a href="{{ route('timetable') }}" class="flex items-center px-4 py-3 text-sm font-medium rounded-md {{ request()->routeIs('timetable') ? 'bg-blue-700 text-white' : 'text-blue-100 hover:bg-blue-700 hover:text-white' }}">
                <i class="fas fa-calendar-alt mr-3"></i> Timetable
            </a>
            <a href="{{ route('results') }}" class="flex items-center px-4 py-3 text-sm font-medium rounded-md {{ request()->routeIs('results') ? 'bg-blue-700 text-white' : 'text-blue-100 hover:bg-blue-700 hover:text-white' }}">
                <i class="fas fa-chart-bar mr-3"></i> Results
            </a>
            <a href="{{ route('attendance') }}" class="flex items-center px-4 py-3 text-sm font-medium rounded-md {{ request()->routeIs('attendance') ? 'bg-blue-700 text-white' : 'text-blue-100 hover:bg-blue-700 hover:text-white' }}">
                <i class="fas fa-check-circle mr-3"></i> Attendance
            </a>
            <a href="{{ route('announcements') }}" class="flex items-center px-4 py-3 text-sm font-medium rounded-md {{ request()->routeIs('announcements') ? 'bg-blue-700 text-white' : 'text-blue-100 hover:bg-blue-700 hover:text-white' }}">
                <i class="fas fa-bullhorn mr-3"></i> Announcements
            </a>
            <a href="{{ route('notifications') }}" class="flex items-center px-4 py-3 text-sm font-medium rounded-md {{ request()->routeIs('notifications') ? 'bg-blue-700 text-white' : 'text-blue-100 hover:bg-blue-700 hover:text-white' }}">
                <i class="fas fa-bell mr-3"></i> Notifications
            </a>
            <a href="{{ route('feedback') }}" class="flex items-center px-4 py-3 text-sm font-medium rounded-md {{ request()->routeIs('feedback') ? 'bg-blue-700 text-white' : 'text-blue-100 hover:bg-blue-700 hover:text-white' }}">
                <i class="fas fa-comment mr-3"></i> Feedback
            </a>
        </nav>
        <div class="mt-auto pb-4 px-4">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full flex items-center px-4 py-3 text-sm font-medium rounded-md text-blue-100 hover:bg-blue-700 hover:text-white">
                    <i class="fas fa-sign-out-alt mr-2"></i> Logout
                </button>
            </form>
        </div>
    </div>
</div>