@extends('admin.layouts.app')

@section('content')
<div class="max-w-xl mx-auto p-6 bg-white shadow">
    <h1 class="text-2xl font-bold mb-4">Tambah Proyek</h1>

    <form method="POST" action="{{ url('/admin/proyek') }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label class="block font-semibold">Judul</label>
            <input type="text" name="judul" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Deskripsi</label>
            <textarea name="deskripsi" class="w-full border rounded px-3 py-2"></textarea>
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Link</label>
            <input type="url" name="link" class="w-full border rounded px-3 py-2">
        </div>

        <!-- Input Gambar -->
        <div class="mb-4">
            <label class="block mb-2">Gambar</label>
            <input type="file" name="gambar" class="mb-4 p-2 border rounded w-full">
        </div>

        <button type="submit" class="w-full mt-4 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-4 py-2 rounded shadow">
            💾 Simpan Proyek
        </button>
    </form>
</div>
@endsection
