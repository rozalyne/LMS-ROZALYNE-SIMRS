<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to LMS ROZALYNE SIMRS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans antialiased">
    <header class="bg-white shadow">
        <nav class="container mx-auto flex justify-between items-center p-6">
            <div class="text-2xl font-bold text-pink-600">LMS ROZALYNE SIMRS</div>
            <div>
                <a href="{{ route('login') }}" class="text-gray-700 hover:text-pink-500 ml-4">Login</a>
                <a href="{{ route('register') }}" class="text-gray-700 hover:text-pink-500 ml-4">Register</a>
            </div>
        </nav>
    </header>

    <main class="flex flex-col items-center justify-center text-center py-20">
        <h1 class="text-5xl font-bold text-pink-600">Welcome to Rozalyne SIMRS</h1>
        <p class="mt-4 text-lg text-gray-600">Learn Management System, Learning </p>
        <a href="{{ route('login') }}" class="mt-8 px-6 py-3 bg-pink-600 text-white rounded-lg shadow hover:bg-pink-500 transition">Get Started</a>
    </main>

    <section class="py-20">
        <h2 class="text-4xl font-bold text-center text-gray-800">Features</h2>
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-12">
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <img src="images/sayang.jpg" alt="Feature One" class="w-full h-32 object-cover rounded-lg">
                <h3 class="text-xl font-semibold text-pink-600 mt-4">Feature One</h3>
                <p class="mt-2 text-gray-600">This feature allows users to easily track their progress through courses and assignments. Stay organized and on top of your learning journey.</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <img src="images/sayang.jpg" alt="Feature Two" class="w-full h-32 object-cover rounded-lg">
                <h3 class="text-xl font-semibold text-pink-600 mt-4">Feature Two</h3>
                <p class="mt-2 text-gray-600">Our platform offers interactive modules that make learning engaging and effective. Each module is designed to enhance your understanding of the subject matter.</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <img src="images/sayang.jpg" alt="Feature Three" class="w-full h-32 object-cover rounded-lg">
                <h3 class="text-xl font-semibold text-pink-600 mt-4">Feature Three</h3>
                <p class="mt-2 text-gray-600">Connect with instructors and peers through our discussion forums. Share insights, ask questions, and collaborate to improve your learning experience.</p>
            </div>
        </div>
    </section>

    <footer class="bg-white text-center py-6 shadow">
        <p class="text-gray-600">&copy; {{ date('Y') }} ROZALYNE. All rights reserved.</p>
    </footer>
</body>
</html>
