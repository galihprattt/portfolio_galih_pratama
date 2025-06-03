@extends('admin.layouts.app')

@section('content')
<div class="max-w-6xl mx-auto p-6 bg-white shadow rounded">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Daftar Proyek</h1>
        <a href="{{ url('/admin/proyek/create') }}" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">
            + Tambah Proyek
        </a>
    </div>

    @if (session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif

    <table class="min-w-full bg-white border">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="px-4 py-2 border">Gambar</th> <!-- Kolom Gambar -->
                <th class="px-4 py-2 border">Judul</th>
                <th class="px-4 py-2 border">Deskripsi</th>
                <th class="px-4 py-2 border">Link</th>
                <th class="px-4 py-2 border text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($proyeks as $proyek)
                <tr class="border-t">
                    <td class="px-4 py-2">
                        @if ($proyek->gambar)
                            <img src="{{ asset('storage/' . $proyek->gambar) }}" alt="Gambar Proyek" class="w-16 h-16 object-cover rounded">
                        @else
                            <span class="text-gray-500 italic">Tidak ada gambar</span>
                        @endif
                    </td>
                    <td class="px-4 py-2">{{ $proyek->judul }}</td>
                    <td class="px-4 py-2">{{ Str::limit($proyek->deskripsi, 50) }}</td>
                    <td class="px-4 py-2">
                        @if ($proyek->link)
                            <a href="{{ $proyek->link }}" target="_blank" class="text-blue-500 underline">Lihat</a>
                        @else
                            -
                        @endif
                    </td>
                    <td class="px-4 py-2 text-center">
                        <a href="{{ url('/admin/proyek/' . $proyek->id . '/edit') }}" class="text-yellow-600 hover:underline mr-2">Edit</a>
                        <form action="{{ url('/admin/proyek/' . $proyek->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin hapus proyek ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
