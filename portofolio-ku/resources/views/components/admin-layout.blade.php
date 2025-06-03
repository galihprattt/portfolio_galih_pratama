<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 p-6">
    <div class="min-h-screen bg-gray-100 p-6">
    <div class="max-w-3xl mx-auto bg-white p-6 rounded shadow">
        {{ $slot }}
    </div>
</div>
</body>
</html>
