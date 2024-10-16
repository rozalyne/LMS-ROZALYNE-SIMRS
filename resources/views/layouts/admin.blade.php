<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js']) <!-- Link to Tailwind CSS -->
    @yield('styles') <!-- Placeholder for additional styles -->
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col">
        <header class="bg-white shadow">
            <nav class="container mx-auto p-4 flex justify-between items-center">
                <h1 class="text-xl font-bold">Admin Dashboard</h1>
                <div>
                    <!-- Navigation Links -->
                    <a href="{{ route('dashboard') }}" class="text-blue-500 hover:underline">Dashboard</a>
                    <a href="{{ route('admin.courses.index') }}" class="text-blue-500 hover:underline ml-4">Courses</a>
                    <a href="{{ route('profile.edit') }}" class="text-blue-500 hover:underline ml-4">Profile</a>

                    <!-- Logout Button -->
                    <form action="{{ route('logout') }}" method="POST" class="inline ml-4">
                        @csrf
                        <button type="submit" class="text-blue-500 hover:underline">Logout</button>
                    </form>
                </div>

            </nav>
        </header>

        <main class="container mx-auto flex-grow p-4">
            @yield('content') <!-- Main content area -->
        </main>

        <footer class="bg-white text-center p-4">
            <p>&copy; {{ date('Y') }} ROZALYNE. All rights reserved.</p>
        </footer>
    </div>
</body>
</html>
