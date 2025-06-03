@extends('layouts.public')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-12">
    <h1 class="text-4xl font-bold mb-10 text-center text-gray-800">Proyek Saya</h1>

    @if(isset($proyeks) && $proyeks->count())
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($proyeks as $proyek)
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden transition-transform hover:-translate-y-1 hover:shadow-xl duration-300">
                    @if($proyek->gambar)
                        <img src="{{ asset('storage/' . $proyek->gambar) }}" alt="{{ $proyek->judul }}" class="w-full h-48 object-cover">
                    @else
                        <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-500 text-sm">Gambar tidak tersedia</div>
                    @endif
                    <div class="p-6 space-y-3">
                        <h3 class="text-xl font-semibold text-gray-800">{{ $proyek->judul }}</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">{{ \Illuminate\Support\Str::limit($proyek->deskripsi, 100) }}</p>
                        
                        @if($proyek->link)
                            <div class="pt-2">
                                <a href="{{ $proyek->link }}" target="_blank"
                                   class="inline-block px-4 py-2 bg-blue-600 text-white text-sm rounded-lg hover:bg-blue-700 transition">
                                   Lihat Proyek
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-center text-gray-500 mt-10">Belum ada proyek yang ditampilkan.</p>
    @endif
</div>
@endsection
