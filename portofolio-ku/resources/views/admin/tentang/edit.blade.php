@extends('admin.layouts.app')

@section('content')
<div class="max-w-3xl mx-auto p-6 bg-white shadow rounded">
    <h1 class="text-2xl font-bold mb-4">Edit Halaman Tentang</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('admin.tentang.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block font-semibold">Deskripsi</label>
            <textarea name="deskripsi" rows="5" class="w-full border rounded px-3 py-2">{{ old('deskripsi', $tentang->deskripsi) }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Foto Profil</label>
            @if($tentang->foto)
                <img src="{{ asset('storage/' . $tentang->foto) }}" class="w-32 h-32 object-cover rounded mb-2">
            @endif
            <input type="file" name="foto" class="w-full border px-3 py-2">
        </div>

        <div class="mb-4">
            <label for="keahlian" class="block font-semibold">Keahlian (pisahkan dengan koma)</label>
            <input type="text" name="keahlian" value="{{ old('keahlian', implode(', ', $tentang->keahlian ?? [])) }}"
                class="w-full border rounded px-3 py-2">
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan Perubahan</button>
    </form>
</div>
@endsection
