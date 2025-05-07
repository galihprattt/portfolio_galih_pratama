@extends('layouts.app')

@section('content')
  <section id="billboard" class="bg-light py-5">
    <div class="container">
      <div class="row justify-content-center">
        <h1 class="section-title text-center mt-4" data-aos="fade-up">New Collections</h1>
        <div class="col-md-6 text-center" data-aos="fade-up" data-aos-delay="300">
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe voluptas ut dolorum consequuntur, adipisci repellat! Eveniet commodi voluptatem voluptate, eum minima, in suscipit explicabo voluptatibus harum, quibusdam ex repellat eaque!</p>
        </div>
      </div>
    </div>
  </section>

  <section class="products-section py-5">
    <div class="container">
      <h2 class="mb-4">Tambah Produk Baru</h2>

      <form action="{{ route('home.search') }}" method="GET" class="mb-4">
        <div class="input-group">
          <input type="text" name="query" class="form-control" placeholder="Cari produk...">
          <button class="btn btn-outline-secondary" type="submit">Cari</button>
        </div>
      </form>

      <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
          <label for="name" class="form-label">Nama Produk</label>
          <input type="text" name="name" class="form-control" id="name" required>
        </div>

        <div class="mb-3">
          <label for="description" class="form-label">Deskripsi</label>
          <textarea name="description" class="form-control" id="description"></textarea>
        </div>

        <div class="mb-3">
          <label for="price" class="form-label">Harga</label>
          <input type="number" name="price" class="form-control" id="price" required>
        </div>

        <div class="mb-3">
          <label for="category_id" class="form-label">Kategori</label>
          <select name="category_id" class="form-control" id="category_id" required>
            <option value="">Pilih Kategori</option>
            @foreach ($categories as $category)
              <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
          </select>
        </div>

        <div class="mb-3">
          <label for="image" class="form-label">Gambar Produk</label>
          <input type="file" name="image" class="form-control" id="image">
        </div>

        <button type="submit" class="btn btn-primary">Simpan Produk</button>
      </form>

    </div>
  </section>
@endsection
