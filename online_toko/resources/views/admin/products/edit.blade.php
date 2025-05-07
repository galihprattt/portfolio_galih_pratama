@extends('layouts.app')

@section('content')
<div class="container py-4">
  <h1>Edit Produk</h1>

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label for="name" class="form-label">Nama Produk</label>
      <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}" required>
    </div>

    <div class="mb-3">
      <label for="description" class="form-label">Deskripsi</label>
      <textarea name="description" class="form-control">{{ old('description', $product->description) }}</textarea>
    </div>

    <div class="mb-3">
      <label for="price" class="form-label">Harga (Rp)</label>
      <input type="number" name="price" class="form-control" value="{{ old('price', $product->price) }}" required>
    </div>

    <!-- Dropdown Kategori -->
    <div class="mb-3">
      <label for="category_id" class="form-label">Kategori</label>
      <select name="category_id" id="category_id" class="form-select">
        <option value="">Pilih Kategori</option>
        @foreach ($categories as $category)
          <option value="{{ $category->id }}" 
            {{ (old('category_id', $product->category_id ?? '') == $category->id) ? 'selected' : '' }}>
            {{ $category->name }}
          </option>
        @endforeach
      </select>
    </div>

    <div class="mb-3">
      <label for="image" class="form-label">Gambar Produk</label><br>
      @if ($product->image)
        <img src="{{ asset('storage/' . $product->image) }}" alt="Gambar Produk" width="150" class="mb-2">
      @endif
      <input type="file" name="image" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Update Produk</button>
    <a href="{{ route('products.index') }}" class="btn btn-secondary">Batal</a>
  </form>
</div>
@endsection
