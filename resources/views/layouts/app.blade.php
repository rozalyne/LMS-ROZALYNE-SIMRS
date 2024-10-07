<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Link ke file CSS Anda -->
</head>
<body>
    <header>
        <h1>LMS Rozalyne</h1>
        <!-- Tambahkan navigasi atau elemen header lain di sini -->
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} LMS Rozalyne</p>
    </footer>
</body>
</html>
