<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Laravel Portfolio CRUD</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
</head>
<body class="bg-gray-100 text-gray-900 min-h-screen">

    {{-- Navbar แบบง่าย ไม่มี login/logout --}}
    <nav class="bg-white shadow p-4 mb-6">
        <div class="max-w-4xl mx-auto flex justify-between items-center">
            <a href="{{ url('/') }}" class="font-bold text-lg">My Portfolio</a>
            <div>
                <a href="{{ route('projects.index') }}" class="text-blue-600">Projects</a>
            </div>
        </div>
    </nav>

    <main class="max-w-4xl mx-auto px-4">
        @yield('content')
    </main>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
