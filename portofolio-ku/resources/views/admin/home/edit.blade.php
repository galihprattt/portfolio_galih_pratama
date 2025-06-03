<x-admin-layout>
    <h2 class="text-xl font-bold mb-4">Edit Halaman Home</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.home.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label class="block mb-2">Judul</label>
        <input type="text" name="judul" class="w-full mb-4 p-2 border rounded" value="{{ old('judul', $home->judul) }}">

        <label class="block mb-2">Subjudul</label>
        <input type="text" name="subjudul" class="w-full mb-4 p-2 border rounded" value="{{ old('subjudul', $home->subjudul) }}">

        <label class="block mb-2">Gambar</label>
        <input type="file" name="gambar" class="mb-4">

        @if($home->gambar)
            <img src="{{ asset('storage/' . $home->gambar) }}" class="h-40 mb-4 rounded" alt="Gambar Home">
        @endif

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan Perubahan</button>
    </form>
</x-admin-layout>
