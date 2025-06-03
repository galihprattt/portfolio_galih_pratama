<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 text-gray-800">
    <header class="bg-white shadow">
        <div class="container mx-auto px-4 py-4">
            <h1 class="text-xl font-bold">Dashboard Admin</h1>
        </div>
    </header>
    <main class="container mx-auto px-4 py-8">
        @yield('content')
    </main>
</body>
</html>
