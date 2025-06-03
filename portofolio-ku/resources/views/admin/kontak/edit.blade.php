@extends('admin.layouts.app')

@section('content')
<div class="max-w-xl mx-auto py-10">
    <h1 class="text-2xl font-bold mb-6">Edit Kontak</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.kontak.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email', $kontak->email) }}" class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label>Telepon</label>
            <input type="text" name="telepon" value="{{ old('telepon', $kontak->telepon) }}" class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label>Alamat</label>
            <textarea name="alamat" class="w-full border rounded px-3 py-2">{{ old('alamat', $kontak->alamat) }}</textarea>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
    </form>
</div>
@endsection
