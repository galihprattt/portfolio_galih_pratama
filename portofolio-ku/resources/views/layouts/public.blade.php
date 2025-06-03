<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portofolio Saya</title>
    @vite('resources/css/app.css') {{-- Menggunakan Tailwind CSS via Vite --}}
</head>
<body class="bg-gray-100 text-gray-800 font-sans">

    {{-- Header --}}
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-5 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-blue-600">Portofolio Saya</h1>

            <nav>
                <ul class="flex space-x-6 text-base font-medium">
                    <li>
                        <a href="/" class="relative {{ request()->is('/') ? 'text-blue-600 font-semibold' : 'text-gray-700' }} hover:text-blue-600 transition duration-300 after:block after:h-0.5 after:bg-blue-600 after:scale-x-0 hover:after:scale-x-100 after:transition-transform after:origin-left">
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="/tentang" class="relative {{ request()->is('tentang') ? 'text-blue-600 font-semibold' : 'text-gray-700' }} hover:text-blue-600 transition duration-300 after:block after:h-0.5 after:bg-blue-600 after:scale-x-0 hover:after:scale-x-100 after:transition-transform after:origin-left">
                            Tentang
                        </a>
                    </li>
                    <li>
                        <a href="/proyek" class="relative {{ request()->is('proyek') ? 'text-blue-600 font-semibold' : 'text-gray-700' }} hover:text-blue-600 transition duration-300 after:block after:h-0.5 after:bg-blue-600 after:scale-x-0 hover:after:scale-x-100 after:transition-transform after:origin-left">
                            Proyek
                        </a>
                    </li>
                    <li>
                        <a href="/kontak" class="relative {{ request()->is('kontak') ? 'text-blue-600 font-semibold' : 'text-gray-700' }} hover:text-blue-600 transition duration-300 after:block after:h-0.5 after:bg-blue-600 after:scale-x-0 hover:after:scale-x-100 after:transition-transform after:origin-left">
                            Kontak
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    {{-- Main Content --}}
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="bg-white border-t mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 text-center text-sm text-gray-500">
            © {{ now()->year }} Portofolio Saya. All rights reserved.
        </div>
    </footer>

</body>
</html>
