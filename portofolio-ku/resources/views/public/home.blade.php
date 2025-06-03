@extends('layouts.public')

@section('content')
    <div class="text-center">
        <h2 class="text-4xl font-bold mb-4">Selamat Datang!</h2>
        <p class="text-lg text-gray-600 mb-6">Saya seorang Web Developer yang fokus pada Laravel & Frontend.</p>
        <a href="{{ route('proyek') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded shadow">
            Lihat Proyek Saya
        </a>
    </div>

    {{-- Tambahan konfirmasi Tailwind --}}
    <div class="text-4xl font-bold text-blue-600 text-center mt-10">
        Tailwind CSS Berhasil!
    </div>
@endsection
