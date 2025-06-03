@extends('admin.layouts.app')

@section('content')
<div class="max-w-xl mx-auto p-6 bg-white shadow">
    <h1 class="text-2xl font-bold mb-4">Edit Proyek</h1>

    <form method="POST" action="{{ url('/admin/proyek/' . $proyek->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block font-semibold">Judul</label>
            <input type="text" name="judul" value="{{ old('judul', $proyek->judul) }}" class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Deskripsi</label>
            <textarea name="deskripsi" class="w-full border rounded px-3 py-2">{{ old('deskripsi', $proyek->deskripsi) }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Link</label>
            <input type="url" name="link" value="{{ old('link', $proyek->link) }}" class="w-full border rounded px-3 py-2">
        </div>

        <!-- Input Gambar -->
        <div class="mb-4">
            <label class="block mb-2">Gambar</label>
            <input type="file" name="gambar" class="mb-4 p-2 border rounded w-full">

            <!-- Preview Gambar jika ada -->
            @if($proyek->gambar)
                <img src="{{ asset('storage/' . $proyek->gambar) }}" class="w-32 h-24 object-cover mb-4 rounded" alt="Preview Gambar">
            @endif
        </div>

        <button type="submit" class="w-full mt-4 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-4 py-2 rounded shadow">
            💾 Simpan Perubahan
        </button>
    </form>
</div>
@endsection
