<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <header class="bg-gray-500 p-4">
        <nav>
            <a href="{{ route('home') }}" class="text-white">Inicio</a>
        </nav>
    </header>
    <div class="container mx-auto p-4">
        @yield('content')
    </div>
</body>
</html>
