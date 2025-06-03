@extends('layouts.admin')
@section('content')
<div class="flex justify-between mb-4">
    <h2 class="text-2xl font-bold">Proyek Saya</h2>
    <a href="{{ route('admin.projects.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">+ Tambah</a>
</div>

<table class="w-full bg-white rounded shadow">
    <thead>
        <tr class="bg-gray-100 text-left">
            <th class="px-4 py-2">Judul</th>
            <th class="px-4 py-2">Deskripsi</th>
            <th class="px-4 py-2">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($projects as $project)
        <tr class="border-t">
            <td class="px-4 py-2">{{ $project->judul }}</td>
            <td class="px-4 py-2">{{ \Illuminate\Support\Str::limit($project->deskripsi, 50) }}</td>
            <td class="px-4 py-2 space-x-2">
                <a href="{{ route('admin.projects.edit', $project) }}" class="text-blue-600">Edit</a>
                <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="inline-block"
                      onsubmit="return confirm('Yakin hapus proyek ini?')">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-600">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
