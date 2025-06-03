@extends('layouts.public')

@section('content')
<section class="bg-gray-50 py-20">
    <div class="max-w-6xl mx-auto px-6 md:flex md:items-center md:space-x-12">
        <div class="md:w-1/3 mb-10 md:mb-0">
            @if($tentang->foto)
                <img src="{{ asset('storage/' . $tentang->foto) }}" alt="Foto Profil"
                    class="rounded-full w-64 h-64 object-cover mx-auto shadow-xl transition duration-300 hover:scale-105">
            @else
                <img src="https://source.unsplash.com/300x300/?person,developer" alt="Foto Profil"
                    class="rounded-full w-64 h-64 object-cover mx-auto shadow-xl transition duration-300 hover:scale-105">
            @endif
        </div>
        <div class="md:w-2/3">
            <h2 class="text-4xl font-bold text-gray-800 mb-6">Tentang Saya</h2>
            <p class="text-gray-700 text-lg leading-relaxed mb-8">
                {{ $tentang->deskripsi ?? 'Deskripsi belum tersedia.' }}
            </p>

            <h3 class="text-xl font-semibold text-gray-800 mb-4">Keahlian:</h3>
            @if(!empty($tentang->keahlian))
                <div class="flex flex-wrap gap-3">
                    @foreach($tentang->keahlian as $skill)
                        <span class="px-4 py-1 bg-blue-100 text-blue-800 text-sm font-medium rounded-full shadow-sm">
                            {{ $skill }}
                        </span>
                    @endforeach
                </div>
            @else
                <p class="text-gray-500">Belum ada data keahlian.</p>
            @endif
        </div>
    </div>
</section>
@endsection
