<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center px-4">

    <div class="bg-white shadow-lg rounded-xl p-8 w-full max-w-3xl text-center">
        <h1 class="text-4xl font-semibold text-gray-800 mb-8">👋 Selamat Datang di Dashboard Admin</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <a href="{{ route('admin.orders') }}"
               class="flex items-center justify-center gap-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-4 px-8 rounded-xl shadow-lg transition duration-300 transform hover:scale-105">
                <span class="text-2xl">📦</span>
                <span class="text-lg">Lihat Daftar Pesanan</span>
            </a>

            <a href="{{ url('/admin/products') }}"
               class="flex items-center justify-center gap-3 bg-green-600 hover:bg-green-700 text-white font-semibold py-4 px-8 rounded-xl shadow-lg transition duration-300 transform hover:scale-105">
                <span class="text-2xl">🛒</span>
                <span class="text-lg">Kelola Produk</span>
            </a>

            <a href="{{ url('/') }}"
               class="flex items-center justify-center gap-3 bg-gray-600 hover:bg-gray-700 text-white font-semibold py-4 px-8 rounded-xl shadow-lg transition duration-300 transform hover:scale-105">
                <span class="text-2xl">🏠</span>
                <span class="text-lg">Halaman Utama Website</span>
            </a>

            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit"
                        class="w-full bg-red-500 hover:bg-red-600 text-white font-semibold py-4 px-8 rounded-xl shadow-lg transition duration-300 transform hover:scale-105">
                    <span class="text-2xl">🔒</span>
                    <span class="text-lg">Logout</span>
                </button>
            </form>
        </div>

        <div class="mt-8 text-sm text-gray-600">
            <p>Jika ada pertanyaan atau masalah, silakan hubungi tim support kami.</p>
        </div>
    </div>

</body>
</html>
