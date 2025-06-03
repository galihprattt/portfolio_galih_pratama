<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Portofolio</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="flex min-h-screen">
        <aside class="w-64 bg-white shadow-md p-6">
            <h2 class="text-xl font-bold mb-6">Admin Panel</h2>
            <nav class="flex flex-col space-y-2">
                <a href="/admin" class="text-gray-700 hover:text-blue-600">Dashboard</a>
                <a href="/admin/proyek" class="text-gray-700 hover:text-blue-600">Kelola Proyek</a>
            </nav>
        </aside>
        <main class="flex-1 p-8">
            @yield('content')
        </main>
    </div>
</body>
</html>
