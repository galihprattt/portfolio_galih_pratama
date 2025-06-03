@extends('layouts.public')

@section('content')
<section class="bg-gradient-to-r from-blue-50 via-white to-purple-50 py-24">
    <div class="max-w-7xl mx-auto px-6 lg:flex lg:items-center lg:justify-between">
        <div class="max-w-2xl space-y-6" data-aos="fade-right">
            <h1 class="text-5xl font-extrabold text-gray-900 leading-tight">
                {{ $home->judul ?? 'Judul belum tersedia' }}
            </h1>
            <p class="text-gray-700 text-xl">
                {{ $home->subjudul ?? 'Subjudul belum tersedia' }}
            </p>
            <div class="flex space-x-4 mt-6">
                <a href="/proyek"
                   class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-full text-lg shadow-lg transition-all duration-300 transform hover:scale-105">
                    🚀 Lihat Proyek
                </a>
                <a href="/kontak"
                   class="border border-blue-600 text-blue-600 hover:bg-blue-100 px-6 py-3 rounded-full text-lg shadow-sm transition-all duration-300 transform hover:scale-105">
                    📬 Kontak Saya
                </a>
            </div>
        </div>

        {{-- Gambar jika tersedia --}}
        <div class="mt-12 lg:mt-0" data-aos="fade-left">
            @if($home && $home->gambar)
                <img src="{{ asset('storage/' . $home->gambar) }}"
                     alt="Hero Image"
                     class="rounded-xl shadow-2xl object-cover w-[500px] h-[400px] transition duration-300 hover:scale-105">
            @else
                <img src="https://source.unsplash.com/500x400/?developer,laptop"
                     alt="Hero Image"
                     class="rounded-xl shadow-2xl object-cover w-[500px] h-[400px] transition duration-300 hover:scale-105">
            @endif
        </div>
    </div>
</section>
@endsection
