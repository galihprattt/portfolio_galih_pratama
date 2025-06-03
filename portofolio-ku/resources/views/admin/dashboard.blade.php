@extends('admin.layouts.app')

@section('content')
<div class="max-w-5xl mx-auto py-12 px-4">
    <h1 class="text-3xl font-bold mb-6">Dashboard Admin</h1>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        {{-- Kartu: Jumlah Proyek --}}
        <div class="bg-white shadow rounded-lg p-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-2">Jumlah Proyek</h2>
            <p class="text-4xl font-bold text-blue-500">{{ $totalProyek }}</p>
        </div>

        {{-- Kartu: Aksi Cepat --}}
        <div class="bg-white shadow rounded-lg p-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-2">Aksi Cepat</h2>
            <div class="space-y-2">
                <a href="{{ url('/admin/proyek/create') }}" class="block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 text-center">+ Tambah Proyek</a>
                <a href="{{ url('/admin/proyek') }}" class="block bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 text-center">Kelola Proyek</a>
                <a href="{{ url('/admin/tentang/edit') }}" class="block bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 text-center">Edit Tentang</a>
                <a href="{{ url('/admin/kontak/edit') }}" class="block bg-indigo-500 text-white px-4 py-2 rounded hover:bg-indigo-600 text-center">Edit Kontak</a>
                <a href="{{ route('admin.home.edit') }}" class="block bg-purple-500 text-white px-4 py-2 rounded hover:bg-purple-600 text-center">Edit Home</a>
            </div>
        </div>
    </div>