@extends('layouts.public')

@section('content')
<section class="bg-gray-100 py-20">
    <div class="max-w-4xl mx-auto px-6">
        <h1 class="text-4xl font-bold text-center text-gray-800 mb-10">Hubungi Saya</h1>

        @if($kontak)
            <div class="bg-white p-8 rounded-2xl shadow-xl grid gap-6 md:grid-cols-3 text-gray-700">
                <div class="flex flex-col items-center text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-blue-600 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12H8m0 0h.01M12 16h.01M12 8h.01M21 12c0 4.97-4.03 9-9 9s-9-4.03-9-9 4.03-9 9-9 9 4.03 9 9z" />
                    </svg>
                    <h2 class="font-semibold text-lg">Email</h2>
                    <p>{{ $kontak->email }}</p>
                </div>

                <div class="flex flex-col items-center text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-green-600 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h2l3.6 7.59-1.35 2.44A2 2 0 008 18h8a2 2 0 001.75-1.03l3.58-6.49A1 1 0 0020.42 9H6.21" />
                    </svg>
                    <h2 class="font-semibold text-lg">Telepon</h2>
                    <p>{{ $kontak->telepon }}</p>
                </div>

                <div class="flex flex-col items-center text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-red-600 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 12l4.243-4.243M6.343 7.343L10.586 12l-4.243 4.243" />
                    </svg>
                    <h2 class="font-semibold text-lg">Alamat</h2>
                    <p>{{ $kontak->alamat }}</p>
                </div>
            </div>
        @else
            <p class="text-center text-gray-500">Kontak belum tersedia.</p>
        @endif
    </div>
</section>
@endsection
